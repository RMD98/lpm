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
        return view('pkm/add_pkm');
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
        //
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
}
