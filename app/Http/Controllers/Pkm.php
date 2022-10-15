<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pkm as Pkms;
use App\Models\Sumberiptek;
use Illuminate\Support\Facades\DB;
use App\Models\Anggota;
use App\Models\Luaran;
use App\Models\Mitrapkm;
use App\Models\Haki;
use App\Models\Buku;
use App\Models\Forum;
use App\Models\Jurnalint;
use App\Models\Ipteklain;
use App\Models\Mitrahukum;
use App\Models\Prodtersertifikasi;  
use App\Models\Prodterstandarisasi;
use App\Models\Wirausahabarumandiri;
use App\Models\Mediamassa;
use App\Models\Penulishaki;
use App\Models\Penulisjurnal;
use App\Models\Penulismakalah;

class Pkm extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
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
            $data = array(
                'judul' => $request->judul,
                'roadmap' => $request->roadmap,
                'bidang' => $request->bidang,
                'jenis' => $request->jenis,
                'skala' => $request->skala,
                'dana' => $request->dana,
                'sumberdana' => $request->sumber,
                'tahun_mulai' => $request->tawal,
                'tahun_akhir' => $request->takhir,
                'sumberiptek' => $request->sumberiptek,
                'danapendamping' => $request->dpend,
                'lab' => $request->lab,
                'kelengkapan' => $request->kelengkapan,
                'created_at' =>time(),
                'updated_at' =>time()
            );
            $id = Pkms::insertGetId($data);
            Luaran::insert(['id_pkm'=>$id]);
            return redirect()->action([Pkm::class,'show'],['id'=>$id]);
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
                ->join('prodis','dosens.prodi','prodis.id')
                ->select('prodis.nama as prodis','dosens.*','ag.*')
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
        if(count($this->luarans($id))!=0){
            $luaran = $this->luarans($id);
        }
        // echo $luaran['forum_ilmiah'];
        return view('pkm/pkm_show',['data'=>$data[0],'ketua'=>$ketua,
        'staff'=>$staff,'mhs'=>$mhs,'alm'=>$alm,'mitra'=>$mitra,'luaran'=>$luaran]);
    }
    public function luarans($id){
        
        $luaran= Luaran::where('id_pkm','=',$id)->get();
        if(count($luaran) != 0){
            foreach($luaran as $key=>$value){
                $luaran['haki'] = Haki::where('hakis.id','=',$luaran[0]->haki)
                ->get();
                if(count($luaran['haki'])){
                    $luaran['penulishaki'] = Penulishaki::where('id_haki',$luaran['haki'][0]->id)
                                        ->join('dosens','dosens.nidn','penulishakis.nidn')
                                        ->get();
                }
                $luaran['prod_standar'] = Prodterstandarisasi::where('id','=',$luaran[0]->prod_terstandarisasi)
                ->join('dosens','dosens.nidn','=','prodterstandarisasis.nidn')
                ->get();
                $luaran['prod_sertif'] = Prodtersertifikasi::where('id','=',$luaran[0]->prod_tersertifikasi)
                ->join('dosens','dosens.nidn','=','prodtersertifikasis.nidn')
                ->get();
                $luaran['mbh'] = Mitrahukum::where('id','=',$luaran[0]->mitra_berbadan_hukum)->get();
                $luaran['buku'] = Buku::where('id','=',$luaran[0]->buku)
                ->join('dosens','dosens.nidn','=','bukus.nidn')
                ->get();
                $luaran['wbm'] = Wirausahabarumandiri::where('id','=',$luaran[0]->wirausaha_baru_mandiri)->get();
                $luaran['forum_ilmiah'] = Forum::where('forums.id','=',$luaran[0]->forum_ilmiah)->get();
                if(count($luaran['forum_ilmiah'])){
                    $luaran['penulismakalah'] = Penulismakalah::where('id_makalah',$luaran['forum_ilmiah'][0]->id)
                        ->join('dosens','penulismakalahs.nidn','=','dosens.nidn')
                        ->get();
                }
                $luaran['media_massa'] = Mediamassa::where('id','=',$luaran[0]->media_massa)
                ->join('dosens','dosens.nidn','=','mediamassas.nidn')
                ->get();
                $luaran['jurnal_internasional'] = Jurnalint::where('jurnalints.id','=',$luaran[0]->jurnal_internasional)->get();
                if(count($luaran['jurnal_internasional'])!=0){
                    $luaran['penulisjurnal'] = Penulisjurnal::where('id_jurnal',$luaran['jurnal_internasional'][0]->id)
                        ->join('dosens','dosens.nidn','=','penulisjurnals.nidn')
                        ->get();
                }
                $luaran['ipteklain'] = Ipteklain::where('id','=',$luaran[0]->iptek_lain)
                ->join('dosens','ipteklains.nidn','=','dosens.nidn')
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
                'jenis' => $request->jenis,
                'skala' => $request->skala,
                'dana' => $request->dana,
                'sumberdana' => $request->sumber,
                'tahun_mulai' => $request->tawal,
                'tahun_akhir' => $request->takhir,
                'sumberiptek' => $request->sumberiptek,
                'danapendamping' => $request->dpend,
                'lab' => $request->lab,
                'kelengkapan' => $request->kelengkapan,
                'updated_at' =>time()
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
