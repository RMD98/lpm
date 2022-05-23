<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kelembagaan as Kelembagaans;

class Kelembagaan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $data = Kelembagaans::get();

        return view('kelembagaan/kelembagaan',['data'=>$data]);
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
        return view('kelembagaan/add_kelembagaan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $file['sk'] = $request->file('filesk');
        $file['res'] = $request->file('filesk');
            if($file['sk'] != NULL){
                $path['sk'] = $request->file('filesk')->store('public/Kelembagaan/SK');
            } else{
                $path['sk'] = Null;
            }
            if($file['res'] != NULL){
                $path['res'] =  $request->file('fileres')->store('public/Kelembagaan/SK Resentra');
            } else{
                $path['res'] = Null;
            }
            $data = array(
                'nama'=> $request->nama,
                'tahun'=> $request->tahun,
                'no_sk'=> $request->nosk,
                'sk_pendirian'=> $path['sk'],
                'alamat'=> $request->alamat,
                'no_telp'=> $request->nopon,
                'no_fax'=> $request->nofax,
                'email'=> $request->email,
                'url'=> $request->url,
                'no_sk_resentra'=> $request->nores,
                'resentra'=> $path['res'],
                'nama_ketua'=> $request->namaket,
                'nidn'=> $request->nidn,
                'ruang_pimpinan'=> $request->pimpinan,
                'ruang_administrasi'=> $request->adm,
                'ruang_penyimpanan_arsip'=> $request->arsp,
                'ruang_pertemuan'=> $request->pertemuan,
                'ruang_seminar'=> $request->sem,
            );
            $id = Kelembagaans::insertGetId($data);
            return redirect()->action([Kelembagaan::class,'show'],['id'=>$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = Kelembagaans::where('id',$id)->get();
        return view('kelembagaan/kelembagaan_show',['data'=>$data[0]]);
    }
    public function file($id)
    {
        //
        $data = DB::table('unitbisnis')->where('id','=',$id)->get();
        $file = $data[0]->SKPUB;
        $response = \Response::make($file,200);
        $content_types = 'application/pdf';
        $response->header('Content-Type',$content_types);
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $data = Kelembagaans::where('id','=',$id)->get();
            // $prodi = DB::table('prodi')->get();
            return view('kelembagaan/edit_kelembagaan',['data'=>$data[0]]);
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
            'nama'=> $request->nama,
            'tahun'=> $request->tahun,
            'no_sk'=> $request->nosk,
            'sk_pendirian'=> $path['sk'],
            'alamat'=> $request->alamat,
            'no_telp'=> $request->nopon,
            'no_fax'=> $request->nofax,
            'email'=> $request->email,
            'url'=> $request->url,
            'no_sk_resentra'=> $request->nores,
            'resentra'=> $path['res'],
            'nama_ketua'=> $request->namaket,
            'nidn'=> $request->nidn,
            'ruang_pimpinan'=> $request->pimpinan,
            'ruang_administrasi'=> $request->adm,
            'ruang_penyimpanan_arsip'=> $request->arsp,
            'ruang_pertemuan'=> $request->pertemuan,
            'ruang_seminar'=> $request->sem,
        );
            Kelembagaans::where('id',$id)->update($data);
            // return $data;
            return redirect()->action([Kelembagaan::class,'index']);
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
        Kelembagaans::where('id','=',$id)->delete();
        return redirect()->action([Kelembagaan::class,'index']);
    }
}
