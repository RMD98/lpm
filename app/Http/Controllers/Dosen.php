<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dosen as Dosens;
use App\Models\Prodi;
class Dosen extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Dosens::get();
        return view('dosen/dosen',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = Prodi::get();
        // $data = DB::table('prodi')->get();
        return view('dosen/add_dosen',['data'=>$data]);
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
                'nama'=> $request->nama,
                'nidn'=> $request->nidn,
                'pendidikan'=> $request->pendidikan,
                'golongan'=> $request->golongan,
                'prodi'=> $request->prodi,
                'jab_fungsional'=> $request->jab,
                'created_at' => time()                
            );
            Dosens::insert($data);
            return redirect()->action([Dosen::class,'index']);
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
