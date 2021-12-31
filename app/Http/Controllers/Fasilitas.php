<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas as fasil;
use App\Models\Prodi;
use Illuminate\Support\Facades\DB;

class Fasilitas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = fasil::get();
        return view('fasilitas/fasilitas',['data'=>$data]);
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
        $data = DB::table('prodi')->get();
        return view('fasilitas/add_fasilitas',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $data = new fasil;
            $data->NamaLab = $request->NamaLab;
            $data->Lingkup = $request->Lingkup;
            $data->SK = $request->filessk;
            $data->save();
            return redirect()->action([Fasilitas::class,'index']);
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
            $data = fasil::where('id','=',$id)->get();
            $prodi = DB::table('prodi')->get();
            return view('fasilitas/edit_fasilitas',['data'=>$data,'prodi'=>$prodi]);
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
                'NamaLab' => $request->NamaLab,
                'Lingkup' => $request->Lingkup,
                'SK' => $request->filesk,
            );
            fasil::where('id',$id)->update($data);
            // return $data;
            return redirect()->action([Fasilitas::class,'index']);
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
        fasil::where('id','=',$id)->delete();
        return redirect()->action([Fasilitas::class,'index']);
    }
}
