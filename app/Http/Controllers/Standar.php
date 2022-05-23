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
            // $data = new fasil;
            // $data->NamaLab = $request->NamaLab;
            // $data->Lingkup = $request->Lingkup;
            // $data->SK = $request->filessk;
            // $data->save();
            $data = array(
                'Nama'=> $request->nama,
                'Nomor'=> $request->nomor,
                'Tahun'=> $request->tahun,
                'Keterangan'=> $request->keterangan,
                'Dokumen'=> $request->dokumen,
                'created_at' =>time(),
                'updated_at' =>time()
            );
            DB::table('standarpkm')->insert($data);
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
            $data = DB::table('standarpkm')->where('id','=',$id)->get();
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
                'Dokumen'=> $request->dokumen,
                'updated_at' =>time()
            );
            DB::table('standarpkm')->where('id',$id)->update($data);
            // return $data;
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
        DB::table('standarpkm')->where('id','=',$id)->delete();
        return redirect()->action([Standar::class,'index']);
    }
}
