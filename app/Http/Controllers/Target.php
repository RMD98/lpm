<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Target extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
        // $this->middleware('checkRole:super admin');
    }
    public function index()
    {
        //
        $data = DB::table('target_pkms')
                    ->join('prodis','prodi','prodis.id')
                    ->join('fakultas','fakultas.id','fakultas')
                    ->select('target_pkms.*','prodis.nama as nama_prodi','fakultas.nama as fakultas')
                    ->get();

        return view('target_pkm/target',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $prodi = DB::table('prodis')->get();

        return view('target_pkm/add_target',compact('prodi'));
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
            'tahun' => $request->tahun,
            'prodi' => $request->prodi,
            'target' => $request->target,
        );

        DB::table('target_pkms')->insert($data);

        return redirect('/target');
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
        $data = DB::table('target_pkms')->where('id',$id)->first();
        $prodi = DB::table('prodis')->get();

        return view('target_pkm/edit_target',compact('data','prodi'));
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
        $data = array (
            'tahun' => $request->tahun,
            'prodi' => $request->prodi,
            'target' => $request->target,
        );

        DB::table('target_pkms')->where('id',$id)->update($data);

        return redirect('/target');
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
        DB::table('target_pkms')->where('id',$id)->delete();

        return redirect('/target');
    }
}
