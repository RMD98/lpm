<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Standar as Standars;

class Standar extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data =Standars::get();
        return view('standar/standar',['data'=>$data]);
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
        return view('standar/add_standar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            if($request->file('dokumen')){
                $file = $request->file('dokumen')->store('Standar PKM');
            } else{
                $file = Null;
            }
            $data = array(
                'Nama'=> $request->nama,
                'Nomor'=> $request->nomor,
                'Tahun'=> $request->tahun,
                'Keterangan'=> $request->keterangan,
                'Dokumen'=> $file,
            );
            Standars::insert($data);
            return redirect()->action([Standar::class,'index']);
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
            $data = Standars::where('id','=',$id)->get();
            // $prodi = DB::table('prodi')->get();
            return view('standar/edit_standar',['data'=>$data[0]]);
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

            $data = array (
                'Nama'=> $request->nama,
                'Nomor'=> $request->nomor,
                'Tahun'=> $request->tahun,
                'Keterangan'=> $request->keterangan,
            );
            if($request->file('dokumen')){
                // Memindahkan File lama ke Folder Old
                $old = Standars::where('id',$id)->first();
                \Storage::move($old->Dokumen,'old/'.$old->Dokumen);
                
                //Memasukan path file baru kedalam array data
                $data = array_merge_recursive($data,['Dokumen'=>$request->file('dokumen')->store('Standar PKM')]);
            }
            Standars::where('id',$id)->update($data);
            
            return redirect()->action([Standar::class,'index']);
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
        $data = Standars::where('id',$id)->first();
        \Storage::delete($data->Dokumen);
        Standars::where('id','=',$id)->delete();
        return redirect()->action([Standar::class,'index']);
    }

    public function download($id){
        $path = Standars::where('id','=',$id)->first();
        $name =$path->Nama;
        // $name +='.pdf';
        return \Storage::download($path->Dokumen,$name.'.pdf');
    }
    public function file($id)
    {
        $path = Standars::where('id','=',$id)->first();
        $file = \Storage::path($path->Dokumen);
        
        return response()->file($file);
    }
}
