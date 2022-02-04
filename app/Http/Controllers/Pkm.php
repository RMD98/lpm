<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas as fasil;
use App\Models\Prodi;
use Illuminate\Support\Facades\DB;

class Pkm extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $data = DB::table('kegiatanpkm')->get();
            return view('pkm/pkm',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $data = Prodi::get();
        // $data = DB::table('prodi')->get();
        $iptek = DB::table('sumberiptek')->get();
        return view('pkm/add_pkm',['iptek'=>$iptek]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // $data = new fasil;
            // $data->NamaLab = $request->NamaLab;
            // $data->Lingkup = $request->Lingkup;
            // $data->SK = $request->filessk;
            // $data->save();
            $data = array(
                'judul' => $request->judul,
                'roadmap' => $request->roadmap,
                'bidang' => $request->bidang,
                'jeniskegiatan' => $request->jenis,
                'skala' => $request->skala,
                'dana' => $request->dana,
                'sumberdana' => $request->sumber,
                'tahun_mulai' => $request->tawal,
                'tahun_akhir' => $request->takhir,
                'sumberiptek' => $request->sumberiptek,
                'danapendamping' => $request->dpend,
                'lab' => $request->lab,
                'kelengkapan' => $request->kelengkapan,
            );
            DB::table('kegiatanpkm')->insert($data);
            return redirect()->action([Pkm::class,'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('kegiatanpkm')->where('id','=',$id)->get();
        $dosen = DB::table('anggotapkm as ag')
                ->join('dosen','ag.nidn_nrp','=','dosen.nidn')
                ->where('id_pkm','=',$id)
                ->where('ag.status','=','DOSEN')
                ->get();
        foreach($dosen as $key=>$value){
            if($dosen[$key]->jabatan == 'KETUA'){
                $ketua = $dosen[$key];
            }else{
                $staff[] = $dosen[$key]; 
            }
        };
        $mhs = DB::table('anggotapkm')
                ->where('id_pkm','=',$id)
                ->where('status','=','MAHASISWA')
                ->get();
        $alm = DB::table('anggotapkm')
                ->where('id_pkm','=',$id)
                ->where('status','=','ALUMNI')
                ->get();

        return view('pkm/pkm_show',['data'=>$data[0],'ketua'=>$ketua,'staff'=>$staff,'mhs'=>$mhs,'alm'=>$alm]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $data = DB::table('kegiatanpkm')->where('id','=',$id)->get();
            // $prodi = DB::table('prodi')->get();
            return view('pkm/edit_pkm',['data'=>$data[0]]);
    }
    
    public function mhs($id)
    {
        $data = DB::table('anggotapkm')
                ->where('id_pkm','=',$id)
                ->where('status','=','MAHASISWA')
                ->get();
        // echo $data;
        return view('pkm/mahasiswa',['data'=>$data,'id'=>$id],);
    }
    
    public function alm($id)
    {
        $data = DB::table('anggotapkm')
                ->where('id_pkm','=',$id)
                ->where('status','=','ALUMNI')
                ->get();
        // echo $data;
        return view('pkm/alumni',['data'=>$data,'id'=>$id],);
    }
    
    public function staff($id){
        $data = DB::table('anggotapkm as ag')
                ->join('dosen','ag.nidn_nrp','=','dosen.nidn')
                ->where('id_pkm','=',$id)
                ->where('ag.status','=','DOSEN')
                ->where('ag.jabatan','=','ANGGOTA')
                ->get();
        return view('pkm/staff',['data'=>$data,'id'=>$id],);
    }
    
    public function upsirtstaff($id,Request $request){
        if($request->nidnbru){
            foreach ($request->nidnbru as $key => $value) {
                $ins = array(
                    'id_pkm' => $id,
                    'status'=>'DOSEN',
                    'jabatan' => 'ANGGOTA',
                    'nama' => $request->namabru[$key],
                    'nidn_nrp' => $request->nidnbru[$key]
                );
                DB::table('anggotapkm')->insert($ins);
                $insd = array(
                    'nama' => $request->namabru[$key],
                    'nidn' => $request->nidnbru[$key],
                    'golongan'=>$request->golbru[$key],
                    'jab_fungsional'=>$request->jabbru[$key],
                    'pendidikan'=>$request->pendbru[$key],
                    'prodi'=>$request->prodibru[$key],
                );
                DB::table('dosen')->upsert($insd,'nidn',['golongan','jab_fungsional','pendidikan','prodi']);
            }
        }
        return redirect()->action([Pkm::class,'show'],['id'=>$id]);
    }
    public function upsirtmhs($id,Request $request){
        if($request->nrpbru){

            foreach($request->nrpbru as $key=>$value){
                $ins = array(
                    'id_pkm' => $id,
                    'status'=>'MAHASISWA',
                    'jabatan' => 'ANGGOTA',
                    'nama' => $request->namabru[$key],
                    'nidn_nrp' => $request->nrpbru[$key]
                );
                DB::table('anggotapkm')->insert($ins);
            }
        }
        if($request->nrp){
            foreach($request->nrp as $key=>$value){
                $up = array(
                    'nama' => $request->nama[$key],
                    'nidn_nrp' => $request->nrp[$key],
                );
                DB::table('anggotapkm')->where('id','=',$request->ids [$key])->update($up);
            }
        }
        return redirect()->action([Pkm::class,'show'],['id'=>$id]);
    }

    public function upsirtalm($id,Request $request){
        if($request->namabru){
            foreach($request->namabru as $key=>$value){
                $ins = array(
                    'status' => 'ALUMNI',
                    'jabatan' => 'ANGGOTA',
                    'nama' => $request->namabru[$key],
                    'pekerjaan' => $request->pekerjaanbru[$key],
                    'instansi' => $request->instansibru[$key],
                    'alamat' => $request->alamatbru[$key],
                    'nohp' => $request->nohpbru[$key],
                    'prodi' => $request->prodibru[$key],
                    'thn_lulus' => $request->thn_lulusbru[$key],
                );
                DB::table('anggotapkm')->insert($ins);
            }
        }
        if($request->nama){
            foreach($request->nama as $key=>$value){
                $ins = array(
                    'nama' => $request->nama[$key],
                    'pekerjaan' => $request->pekerjaan[$key],
                    'instansi' => $request->instansi[$key],
                    'alamat' => $request->alamat[$key],
                    'nohp' => $request->nohp[$key],
                    'prodi' => $request->prodi[$key],
                    'thn_lulus' => $request->thn_lulus[$key],
                );
                DB::table('anggotapkm')->where('id','=',$request->ids[$key])->update($ins);
            }   
        }
        return redirect()->action([Pkm::class,'show'],['id'=>$id]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $data = array(
                'judul' => $request->judul,
                'roadmap' => $request->roadmap,
                'bidang' => $request->bidang,
                'jeniskegiatan' => $request->jenis,
                'skala' => $request->skala,
                'dana' => $request->dana,
                'sumberdana' => $request->sumber,
                'tahun_mulai' => $request->tawal,
                'tahun_akhir' => $request->takhir,
                'sumberiptek' => $request->sumberiptek,
                'danapendamping' => $request->dpend,
                'lab' => $request->lab,
                'kelengkapan' => $request->kelengkapan,
            );
            DB::table('kegiatanpkm')->where('id',$id)->update($data);
            // return $data;
            return redirect()->action([Pkm::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Db::table('kegiatanpkm')->where('id','=',$id)->delete();
        return redirect()->action([Pkm::class,'index']);
    }

    public function del($ids,$id){
       
        DB::table('anggotapkm')->where('id','=',$id)->delete();
        return redirect()->action([Pkm::class,'show'],['id'=>$ids]);
    }
}
