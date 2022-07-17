<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota as Anggotas;
use App\Models\Dosen as Dosen;
use App\Models\Prodi as Prodi;
use Illuminate\Support\Facades\DB;

class Anggota extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ketua($id){
        $data = Anggotas::where('id_pkm','=',$id)
                ->where('jabatan','=','KETUA')
                ->get();
        $prodi = DB::table('prodis')->get();

        return view('pkm/ketua',['data'=>$data,'id'=>$id,'prodi'=>$prodi]);
    }
    public function mhs($id)
    {
        $data = Anggotas::where('id_pkm','=',$id)
                ->where('status','=','MAHASISWA')
                ->get();
       
        return view('pkm/mahasiswa',['data'=>$data,'id'=>$id],);
    }
    public function alm($id)
    {
        $data = Anggotas::where('id_pkm','=',$id)
                ->where('status','=','ALUMNI')
                ->get();
        $prodi = Prodi::get();
       
        return view('pkm/alumni',['data'=>$data,'id'=>$id,'prodi'=>$prodi]);
    }
    
    public function staff($id){
        $data = DB::table('anggotas as ag')
                ->join('dosens','ag.nidn_nrp','=','dosens.nidn')
                ->where('id_pkm','=',$id)
                ->where('ag.status','=','DOSEN')
                ->where('ag.jabatan','=','ANGGOTA')
                ->get();
        $prodi = Prodi::get();
        return view('pkm/staff',['data'=>$data,'id'=>$id,'prodi'=>$prodi]);
    }
    public function upsirtketua($id,Request $request){
        if($request->nidnbru){
            foreach ($request->nidnbru as $key => $value) {
                $ins = array(
                    'id_pkm' => $id,
                    'status'=>'DOSEN',
                    'jabatan' => 'KETUA',
                    'nama' => $request->namabru[$key],
                    'nidn_nrp' => $request->nidnbru[$key]
                );
                Anggotas::insert($ins);
                $insd = array(
                    'nama' => $request->namabru[$key],
                    'nidn' => $request->nidnbru[$key],
                    'golongan'=>$request->golbru[$key],
                    'jab_fungsional'=>$request->jabbru[$key],
                    'pendidikan'=>$request->pendbru[$key],
                    'prodi'=>$request->prodibru[$key],
                );
                Dosen::upsert($insd,'nidn',['golongan','jab_fungsional','pendidikan','prodi']);
            }
        }
        return redirect()->action([Pkm::class,'show'],['id'=>$id]);
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
                Anggotas::insert($ins);
                $insd = array(
                    'nama' => $request->namabru[$key],
                    'nidn' => $request->nidnbru[$key],
                    'golongan'=>$request->golbru[$key],
                    'jab_fungsional'=>$request->jabbru[$key],
                    'pendidikan'=>$request->pendbru[$key],
                    'prodi'=>$request->prodibru[$key],
                );
                Dosen::upsert($insd,'nidn',['golongan','jab_fungsional','pendidikan','prodi']);
            }
        }
        if($request->nidn){

            foreach($request->ids as $key=>$value){
                $up = array(
                    'nama' => $request->nama[$key],
                    'nidn_nrp' => $request->nidn[$key]
                );
                Anggotas::where('id','=',$request->id[$key])->update($up);
                $upd = array(
                    'nama' => $request->nama[$key],
                    'golongan'=>$request->gol[$key],
                    'jab_fungsional'=>$request->jab[$key],
                    'pendidikan'=>$request->pend[$key],
                    'prodi'=>$request->prodi[$key],
                );
                Dosen::where('nidn','=',$request->nidn[$key]);
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
                Anggotas::insert($ins);
            }
        }
        if($request->nrp){
            foreach($request->nrp as $key=>$value){
                $up = array(
                    'nama' => $request->nama[$key],
                    'nidn_nrp' => $request->nrp[$key],
                );
                Anggotas::where('id','=',$request->ids[$key])->update($up);
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
                    'id_pkm' =>$id,
                );
                Anggotas::insert($ins);
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
                Anggota::where('id','=',$request->ids[$key])->update($ins);
            }   
        }
        return redirect()->action([Pkm::class,'show'],['id'=>$id]);
    }
    public function index()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$ids)
    {
        Anggotas::where('id','=',$ids)->delete();
        return redirect()->action([Pkm::class,'show'],['id'=>$id]);
        //
    }
}
