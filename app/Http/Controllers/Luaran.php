<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Luaran as Luarans;
use App\Models\Ipteklain;
use App\Models\Haki;
use App\Models\Buku;
use App\Models\Mitrahukum;
use App\Models\Prodtersertifikasi;
use App\Models\Prodterstandarisasi;
use App\Models\Penulishaki;
use App\Models\Penulismakalah;
use App\Models\Penulisjurnal;
use App\Models\Forum;
use App\Models\Mediamassa;
use App\Models\Jurnalint;
use App\Models\Wirausahabarumandiri as wbm;


class Luaran extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function iptek($id){
        $luaran= Luarans::where('id_pkm','=',$id)->get();
        $data = Null;
        if(count($luaran) !=0){   
            $data = Ipteklain::where('id','=',$luaran[0]->iptek_lain)
                ->join('dosens','ipteklains.nidn','=','dosens.nidn')   
                ->get();
            }
        return view('pkm/luaran/ipteklain',['data'=>$data,'id'=>$id]);
    }
    public function upsirtiptek($id,Request $request){
       
            $file = $request->file('bukti');
            // foreach($request->ids as $key=>$value){
                if($file != NULL){
                    $path = $file->store('public/luaran/ipteklain');
                } else{
                    $path = Null;
                }
                $up = array(
                    'judul' => $request->judul,
                    'nidn' => $request->nidn,
                    'jenis' => $request->jenis,
                    'deskripsi' => $request->deskripsi,
                    'bukti' => $path,
                );
                $iptek = Ipteklain::updateOrCreate(['id'=>$request->ids],$up);
                $ins = array(
                    'iptek_lain' => $iptek->id,
                );
                Luarans::updateOrInsert(['id_pkm'=>$id],$ins);
            // };
        return redirect()->action([Pkm::class,'show'],['id'=>$id]);
    }
    public function prodser($id){
        $luaran= Luarans::where('id_pkm','=',$id)->get();
        $data = [];
        if(count($luaran) !=0){   
            $data = Prodtersertifikasi::where('id','=',$luaran[0]->prod_tersertifikasi)
                ->join('dosens','prodtersertifikasis.nidn','=','dosens.nidn')   
                ->get();
            }
        return view('pkm/luaran/prodser',['data'=>$data,'id'=>$id]);
    }
    public function upsirtprodser($id,Request $request){
       
            $file = $request->file('bukti');
            // foreach($request->ids as $key=>$value){
                if($file != NULL){
                    $path = $file->store('public/luaran/ipteklain');
                } else{
                    $path = Null;
                }
                $up = array(
                    'judul' => $request->judul,
                    'nidn' => $request->nidn,
                    'instansi' => $request->instansi,
                    'no_keputusan' => $request->nokep,
                    'bukti' => $path,
                );
                $prodser = Prodterstandarisasi::updateOrCreate(['id'=>$request->ids],$up);
                Luarans::where('id_pkm',$id)->update(['prod_terstandarisasi'=>$prodser->id]);
            // };
        return redirect()->action([Pkm::class,'show'],['id'=>$id]);
    }
    public function prodstan($id){
        $luaran= Luarans::where('id_pkm','=',$id)->get();
        $data = [];
        if(count($luaran) !=0){   
            $data = Prodterstandarisasi::where('id','=',$luaran[0]->prod_tersertifikasi)
                ->join('dosens','prodterstandarisasis.nidn','=','dosens.nidn')   
                ->get();
            }
        return view('pkm/luaran/prodstan',['data'=>$data,'id'=>$id]);
    }
    public function upsirtprodstan($id,Request $request){
       
            $file = $request->file('bukti');
            // foreach($request->ids as $key=>$value){
                if($file != NULL){
                    $path = $file->store('public/luaran/ipteklain');
                } else{
                    $path = Null;
                }
                $up = array(
                    'judul' => $request->judul,
                    'nidn' => $request->nidn,
                    'instansi' => $request->instansi,
                    'no_keputusan' => $request->nokep,
                    'bukti' => $path,
                );
                $prodser = Prodterstandarisasi::updateOrCreate(['id'=>$request->ids],$up);
                Luarans::where('id_pkm',$id)->update(['prod_terstandarisasi'=>$prodser->id]);
            // };
        return redirect()->action([Pkm::class,'show'],['id'=>$id]);
    }

    public function haki($id){
        $luaran= Luarans::where('id_pkm','=',$id)->get();
        $data = Null;
        if(count($luaran) !=0){   
            $data = Haki::where('hakis.id','=',$luaran[0]->haki)
                ->join('penulishakis as ph','hakis.id','=','ph.id_haki')
                ->join('dosens','dosens.nidn','=','ph.nidn')
                ->get();
            };
        // echo count($data);
        // echo $data;
        return view('pkm/luaran/haki',['data'=>$data,'id'=>$id]);
    }
    public function upsirthaki($id,Request $request){
       
            $file = $request->file('bukti');
            // foreach($request->ids as $key=>$value){
                if($file != NULL){
                    $path = $file->store('public/luaran/ipteklain');
                } else{
                    $path = Null;
                }
                $up = array(
                    'judul' => $request->judul,
                    'jenis' => $request->jenis,
                    'status' => $request->status,
                    'no_daftar' => $request->nodaftar,
                    'bukti' => $path,
                );
                $haki = Haki::updateOrCreate(['id'=>$request->ids],$up);
                $dsn = array(
                    'nidn' => $request->nidn,
                    'id_haki' => $haki->id
                );
                Penulishaki::updateOrInsert($dsn,$dsn);
                $ins = array(
                    'haki' => $haki->id,
                );
                Luarans::where('id_pkm',$id)->update(['haki'=>$haki->id]);
            // };
        return redirect()->action([Pkm::class,'show'],['id'=>$id]);
    }
    public function buku($id){
        $luaran= Luarans::where('id_pkm','=',$id)->get();
        $data = Null;
        if(count($luaran) !=0){   
            $data = Buku::where('bukus.id','=',$luaran[0]->buku)
                ->join('dosens','dosens.nidn','=','bukus.nidn')
                ->get();
            };
        // echo count($data);
        // echo $data;
        return view('pkm/luaran/buku',['data'=>$data,'id'=>$id]);
    }
    public function upsirtbuku($id,Request $request){
    
        $file = $request->file('bukti');
            if($file != NULL){
                $path = $file->store('public/luaran/ipteklain');
            } else{
                $path = Null;
            }
            $up = array(
                'judul' => $request->judul,
                'jenis' => $request->jenis,
                'penerbit' => $request->penerbit,
                'isbn' => $request->isbn,
                'jum_halaman' => $request->jum_halaman,
                'bukti' => $path,
                'nidn' => $request->nidn,
            );
            $buku = Buku::updateOrCreate(['id'=>$request->ids],$up);
            Luarans::where('id_pkm',$id)->update(['buku'=>$buku->id]);
        return redirect()->action([Pkm::class,'show'],['id'=>$id]);
    }
    public function mitrahukum($id){
        $luaran= Luarans::where('id_pkm','=',$id)->get();
        $data = Null;
        if(count($luaran) !=0){   
            $data = Mitrahukum::where('mitrahukums.id','=',$luaran[0]->mitra_berbadan_hukum)
                ->get();
            };
        // echo count($data);
        // echo $data;
        return view('pkm/luaran/mitrahukum',['data'=>$data,'id'=>$id]);
    }
    public function upsirtmitrahukum($id,Request $request){
    
        $file = $request->file('bukti');
            if($file != NULL){
                $path = $file->store('public/luaran/ipteklain');
            } else{
                $path = Null;
            }
            $up = array(
                'nama' => $request->nama,
                'bidang_usaha' => $request->bidang,
                'no_badan_hukum' => $request->nohuk,
                'bukti' => $path,
            );
            $mitra = Mitrahukum::updateOrCreate(['id'=>$request->ids],$up);
            Luarans::where('id_pkm',$id)->update(['mitra_berbadan_hukum'=>$mitra->id]);
        return redirect()->action([Pkm::class,'show'],['id'=>$id]);
    }
    public function forum($id){
        $luaran= Luarans::where('id_pkm','=',$id)->get();
        $data = Null;
        if(count($luaran) !=0){   
            $data = Forum::where('forums.id','=',$luaran[0]->forum_ilmiah)
                ->join('penulismakalahs as pm','forums.id','=','pm.id_makalah')
                ->join('dosens','dosens.nidn','=','pm.nidn')
                // ->select('*','pm.id as pmid')
                ->get();
            };
        // echo count($data);
        echo $data;
        // return view('pkm/luaran/forum',['data'=>$data,'id'=>$id]);
    }
    public function upsirtforum($id,Request $request){
    
        $file = $request->file('bukti');
            if($file != NULL){
                $path = $file->store('public/luaran/ipteklain');
            } else{
                $path = Null;
            }
            $up = array(
                'judul' => $request->judul,
                'judul_forum' => $request->judul_forum,
                'tingkat' => $request->tingkat,
                'penyelenggara' => $request->penyelenggara,
                'isbn' => $request->isbn,
                'dari' => $request->dari,
                'sampai' => $request->sampai,
                'tempat' => $request->tempat,
                'bukti' => $path,
            );
            $forum = Forum::updateOrCreate(['id'=>$request->ids],$up);
            $dsn = array(
                'nidn' => $request->nidn,
                'id_makalah' => $forum->id,
            );
            Penulismakalah::upsert($dsn,'id_makalah');
            Luarans::where('id_pkm',$id)->update(['forum_ilmiah'=>$forum->id]);
        return redirect()->action([Pkm::class,'show'],['id'=>$id]);
    }
    public function media($id){
        $luaran= Luarans::where('id_pkm','=',$id)->get();
        $data = Null;
        if(count($luaran) !=0){   
            $data = Mediamassa::where('mediamassas.id','=',$luaran[0]->media_massa)
                ->join('dosens','dosens.nidn','mediamassas.nidn')
                ->get();
            };
        // echo count($data);
        // echo $data;
        return view('pkm/luaran/mediamassa',['data'=>$data,'id'=>$id]);
    }
    public function upsirtmedia($id,Request $request){
    
        $file = $request->file('bukti');
            if($file != NULL){
                $path = $file->store('public/luaran/ipteklain');
            } else{
                $path = Null;
            }
            $up = array(
                'judul' => $request->judul,
                'nidn' => $request->nidn,
                'nama_media' => $request->nama_media,
                'url' => $request->url,
                'jenis' => $request->jenis,
                'bukti' => $path,
            );
            $media = Mediamassa::updateOrCreate(['id'=>$request->ids],$up);
            if($request->jenis == 'Majalah'){
                $ups = array(
                    'volume' => $request->volume,
                    'nomor' => $request->nomor,
                    'hal' => $request->hal,
                );
            }else if($reques->jenis == 'Koran'){
                $ups = array(
                    'tgl_terbit'=>$request->tgl_terbit,
                    'skala'=>$request->skala,
                    'hal' => $request->hals,
                );
            };
            Mediamassa::where('id',$media->id)->update($ups);
            Luarans::where('id_pkm',$id)->update(['media_massa'=>$media->id]);
        return redirect()->action([Pkm::class,'show'],['id'=>$id]);
    }
    public function wbm($id){
        $luaran= Luarans::where('id_pkm','=',$id)->get();
        $data = Null;
        if(count($luaran) !=0){   
            $data = wbm::where('wirausahabarumandiris.id','=',$luaran[0]->wirausaha_baru_mandiri)
                ->get();
            };
        // echo count($data);
        // echo $data;
        return view('pkm/luaran/wirausahabm',['data'=>$data,'id'=>$id]);
    }
    public function upsirtwbm($id,Request $request){
    
        $file = $request->file('bukti');
            if($file != NULL){
                $path = $file->store('public/luaran/wirausaha_baru_mandiri');
            } else{
                $path = Null;
            }
            $up = array(
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'bukti' => $path,
            );
            $wbm = wbm::updateOrCreate(['id'=>$request->ids],$up);
            Luarans::where('id_pkm',$id)->update(['wirausaha_baru_mandiri'=>$wbm->id]);
        return redirect()->action([Pkm::class,'show'],['id'=>$id]);
    }
    public function jurnal($id){
        $luaran= Luarans::where('id_pkm','=',$id)->get();
        $data = Null;
        if(count($luaran) !=0){   
            $data = Jurnalint::where('jurnalints.id','=',$luaran[0]->wirausaha_baru_mandiri)
                ->get();
            };
        // echo count($data);
        // echo $data;
        return view('pkm/luaran/jurnalint',['data'=>$data,'id'=>$id]);
    }
    public function upsirtjurnal($id,Request $request){
    
        $file = $request->file('bukti');
            if($file != NULL){
                $path = $file->store('public/luaran/jurnal_internasional');
            } else{
                $path = Null;
            }
            $up = array(
                'judul' => $request->judul,
                'url' => $request->url,
                'nama_jurnal' => $request->nama_jurnal,
                'jenis' => $request->jenis,
                'p_issn' => $request->p_issn,
                'e_issn' => $request->e_issn,
                'volume' => $request->volume,
                'nomor' => $request->nomor,
                'halaman' => $request->hal,
                'bukti' => $path,
            );
            $jurnal = Jurnalint::updateOrCreate(['id'=>$request->ids],$up);
            $dsn = array(
                'nidn' => $request->nidn,
                'id_jurnal' => $jurnal->id,
            );
            Penulisjurnal::upsert($dsn,'id_jurnal');
            Luarans::where('id_pkm',$id)->update(['jurnal_internasional'=>$jurnal->id]);
        return redirect()->action([Pkm::class,'show'],['id'=>$id]);
    }
    public function index()
    {
        //
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
    public function destroy($luaran,$id,$ids)
    {
        switch($luaran) :
            case('ipteklain') : Ipteklain::where('id','=',$ids)->delete();
            case('haki') : Haki::where('id','=',$ids)->delete();
            case('buku') : Buku::where('id','=',$ids)->delete();
            case('mitrahukum') : Mitrahukum::where('id','=',$ids)->delete();
            case('prodser') : Prodsertifikasi::where('id','=',$ids)->delete();
            case('prodstan') : Prodstandarisasi::where('id','=',$ids)->delete();
            case('forum') : Forum::where('id','=',$ids)->delete();
            case('media') : Mediamassa::where('id','=',$ids)->delete();
            case('wbm') : wbm::where('id','=',$ids)->delete();
            case('jurnal') : Jurnalint::where('id','=',$ids)->delete();
        endswitch;
        return redirect()->action([Pkm::class,'show'],['id'=>$id]);
    }
}
