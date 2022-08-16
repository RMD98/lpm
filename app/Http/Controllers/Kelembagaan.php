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
        if($request->file('filesk') != NULL){
            $sk = $request->file('filesk')->store('public/Kelembagaan/SK');
        } else{
            $sk = Null;
        }
        if($request->file('fileres') != NULL){
            $res =  $request->file('fileres')->store('public/Kelembagaan/SK Resentra');
        } else{
            $res = Null;
        }
        $data = array(
            'nama'=> $request->nama,
            'tahun'=> $request->tahun,
            'no_sk'=> $request->nosk,
            'sk_pendirian'=> $sk,
            'alamat'=> $request->alamat,
            'no_telp'=> $request->nopon,
            'no_fax'=> $request->nofax,
            'email'=> $request->email,
            'url'=> $request->url,
            'no_sk_resentra'=> $request->nores,
            'resentra'=> $res,
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
    public function file($file,$id)
    {
        //
        $data = Kelembagaans::where('id','=',$id)->get();
        if($file == 'sk'){
            $path = \Storage::path($data[0]->sk_pendirian);
        } elseif($file =='res'){
            $path = \Storage::path($data[0]->resentra);
        }
        
        return response()->file($path);
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
            'alamat'=> $request->alamat,
            'no_telp'=> $request->nopon,
            'no_fax'=> $request->nofax,
            'email'=> $request->email,
            'url'=> $request->url,
            'no_sk_resentra'=> $request->nores,
            'nama_ketua'=> $request->namaket,
            'nidn'=> $request->nidn,
            'ruang_pimpinan'=> $request->pimpinan,
            'ruang_administrasi'=> $request->adm,
            'ruang_penyimpanan_arsip'=> $request->arsp,
            'ruang_pertemuan'=> $request->pertemuan,
            'ruang_seminar'=> $request->sem,
        );
        if($request->file('filesk')){
            $sk = $request->file('filesk')->store('Kelembagaan/SK');
            $data = array_merge_recursive($data,['sk_pendirian'=>$sk]);
        } 
        if($request->file('fileres')){
            $res =  $request->file('fileres')->store('Kelembagaan/SK Resentra');
            $data = array_merge_recursive($data,['resentra'=>$res]);
        } 
            $file = Kelembagaans::where('id',$id)->first();
            if($file->sk_pendirian){
                \Storage::move($file->sk_pendirian,'old/'.$file->sk_pendirian);
            }
            if($file->resentra){
                \Storage::move($file->resentra,'old/'.$file->resentra);
            }
            Kelembagaans::where('id',$id)->update($data);
            
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
        $data = Kelembagaans::where('id',$id)->first();
        \Storage::delete([$data->sk_pendirian,$data->resentra]);
        Kelembagaans::where('id','=',$id)->delete();
        return redirect()->action([Kelembagaan::class,'index']);
    }
    public function download($file,$id){
        $path = Kelembagaans::where('id','=',$id)->first();
        $name =$path->nama;
        if($file == 'res'){
            return \Storage::download($path->resentra,$name.'_resntra.pdf');
        }elseif($file == 'sk'){
            return \Storage::download($path->sk_pendirian,$name.'_sk_pendirian.pdf');
        }
        // $name +='.pdf';
    }
}
