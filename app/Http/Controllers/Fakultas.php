<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Fakultas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  __construct(){
        $this->middleware('auth');
        $this->middleware('checkRole:super admin');
    }
    public function index()
    {
        //
        $data = DB::table('fakultas')->get();
        return view('fakultas/fakultas',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('fakultas/add_fakultas');
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
        DB::table('fakultas')->insert(['nama'=>$request->nama]);
        return redirect('/fakultas');
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
        $data = DB::table('fakultas')->where('id',$id)->first();

        return view('fakultas/edit_fakultas',compact('data'));
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
        DB::table('fakultas')->where('id',$id)->update(['nama'=>$request->nama]);

        return redirect('/fakultas');
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
        DB::table('fakultas')->where('id',$id)->delete();

        return redirect('/fakultas');
    }
}
