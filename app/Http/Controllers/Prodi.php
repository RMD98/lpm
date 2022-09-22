<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Prodi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __consturct(){
        $this->middleware('auth');
        $this->middleware('checkRole:super admin');
    }
    public function index()
    {
        //
        $data = DB::table('prodis')
                    ->join('fakultas','fakultas.id','fakultas')
                    ->select('fakultas.nama as nama_fakultas','prodis.*')
                    ->get();
        // print_r($data);
        return view('prodi/prodi',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fakultas = DB::table('fakultas')->get();
        return view('prodi/add_prodi',compact('fakultas'));
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
        $data = array(
            'kode' => $request->kode,
            'nama' => $request->nama,
            'fakultas' => $request->fakultas,
        );
        
        DB::table('prodis')->insert($data);

        return redirect('/prodi');
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
        //
        $data = DB::table('prodis')->where('id',$id)->first();
        $fakultas = DB::table('fakultas')->get();
        return view('prodi/edit_prodi',compact('data','fakultas'));
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
        $data = array(
            'kode' => $request->kode,
            'nama' => $request->nama,
            'fakultas' => $request->fakultas,
        );

        DB::table('prodis')->where('id',$id)->update($data);

        return redirect('/prodi');
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
        DB::table('prodis')->where('id',$id)->delete();

        return redirect('/prodi');
    }
}
