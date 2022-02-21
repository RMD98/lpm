<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pkm as Pkms;
use App\Models\Sumberiptek;
use Illuminate\Support\Facades\DB;
use App\Models\Anggota;
use App\Models\Luaran;
use App\Models\Mitrapkm;

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
            $data = Pkms::get();
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
        $iptek = Sumberiptek::get();
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
            Pkms::insert($data);
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
        $data = Pkms::where('id','=',$id)->get();
        $dosen = DB::table('anggotas as ag')
                ->join('dosens','ag.nidn_nrp','=','dosens.nidn')
                ->where('id_pkm','=',$id)
                ->where('ag.status','=','DOSEN')
                ->get();
        $ketua=[];
        $staff=[];
        foreach($dosen as $key=>$value){
            if($dosen[$key]->jabatan == 'KETUA'){
                $ketua[] = $dosen[$key];
            }else{
                $staff[] = $dosen[$key];
            }
        };
        $mhs = Anggota::where('id_pkm','=',$id)
                ->where('status','=','MAHASISWA')
                ->get();
        $alm = Anggota::where('id_pkm','=',$id)
                ->where('status','=','ALUMNI')
                ->get();
        $mitra = Mitrapkm::join('mitras','mitrapkms.id_mitra','=','mitras.id')
                ->where('mitrapkms.id_pkm','=',$id)
                ->get();
        $luaran = array('haki'=>[],'prod_standar'=>[],'buku'=>[],'prod_sertif'=>[],'mbh'=>[],
                        'wbm'=>[],'forum_ilmiah'=>[],'media_massa'=>[],
                        'jurnal_internasional'=>[],'ipteklain'=>[]);
        // echo $luaran['haki'];
        if(count($this->luaran($id))!=0){
            $luaran = $this->luaran($id);
        }
        
        return view('pkm/pkm_show',['data'=>$data[0],'ketua'=>$ketua,
        'staff'=>$staff,'mhs'=>$mhs,'alm'=>$alm,'mitra'=>$mitra,'luaran'=>$luaran]);
    }
    public function luaran($id){
        
        $luaran= Luaran::get();
        if(count($luaran) != 0){
            foreach($luaran as $key=>$value){
                $luaran['haki'] = DB::table('hakis')
                ->where('hakis.id','=',$luaran->haki)
                ->join('penulis_hakis as ph','hakis.id','=','ph.id_haki')
                ->join('dosen','penulis_haki.nidn','=','dosen.nidn')
                ->get();
                $luaran['prod_standar'] = DB::table('prod_terstandarisasi as pt')
                ->where('id','=',$luaran[0]->prod_terstandarisasi)
                ->join('dosen','dosen.nidn','=','pt.nidn')
                ->get();
                $luaran['prod_sertif'] = DB::table('prod_tersertifikasi as pt')
                ->where('id','=',$luaran[0]->prod_tersertifikasi)
                ->join('dosen','dosen.nidn','=','pt.nidn')
                ->get();
                $luaran['mbh'] = DB::table('mitra_berbadan_hukum')->where('id','=',$luaran[0]->mitra_berbadan_hukum)->get();
                $luaran['buku'] = DB::table('buku')
                ->where('id','=',$luaran[0]->buku)
                ->join('dosen','dosen.nidn','=','buku.nidn')
                ->get();
                $luaran['wbm'] = DB::table('wirausaha_baru_mandiri')->where('id','=',$luaran[0]->wirausaha_baru_mandiri)->get();
                $luaran['forum_ilmiah'] = DB::table('forum_ilmiah as fi')
                ->where('fi.id','=',$luaran[0]->forum_ilmiah)
                ->join('penulis_makalah as pm','pm.id_makalah','=','fi.id')
                ->join('dosen','pm.nidn','=','dosen.nidn')
                ->get();
                $luaran['media_massa'] = DB::table('media_massa')
                ->where('id','=',$luaran[0]->media_massa)
                ->join('dosen','dosen.nidn','=','media_massa.nidn')
                ->get();
                $luaran['jurnal_internasional'] = DB::table('jurnal_internasional as ji')
                ->where('ji.id','=',$luaran[0]->jurnal_internasional)
                ->join('penulis_jurnal as pj','pj.id_jurnal','=','ji.id')
                ->join('dosen','dosen.nidn','=','pj.nidn')
                ->get();
                $luaran['ipteklain'] = DB::table('ipteklain')
                ->where('id','=',$luaran[0]->iptek_lain)
                ->join('dosen','ipteklain.nidn','=','dosen.nidn')
                ->get();
            }   
        }
        //  echo $luaran['prod_terstandarisasi'];
        return $luaran;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $data = Pkms::where('id','=',$id)->get();
            // $prodi = DB::table('prodi')->get();
            return view('pkm/edit_pkm',['data'=>$data[0]]);
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
            Pkms::where('id',$id)->update($data);
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
        Pkms::where('id','=',$id)->delete();
        return redirect()->action([Pkm::class,'index']);
    }

}
