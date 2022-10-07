<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Sumber extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('checkRole:super admin');
    }
    public function index()
    {
        //
        $data = DB::table('sumberipteks')->get();
      
        return view('sumber_iptek/sumber_iptek',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sumber_iptek/add_sumber');
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
        DB::table('sumberipteks')->insert(['sumber'=>$request->sumber]);
        return redirect('/sumb');
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
        $data = DB::table('sumberipteks')->where('id',$id)->first();

        return view('sumber_iptek/edit_sumber',compact('data'));
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
        DB::table('sumberipteks')->where('id',$id)->update(['sumber'=>$request->sumber]);

        return redirect('/sumb');
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
        DB::table('sumberipteks')->where('id',$id)->delete();

        return redirect('/sumb');
    }
}
