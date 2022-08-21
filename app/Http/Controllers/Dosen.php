<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dosen as Dosens;
use App\Models\Prodi;
class Dosen extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
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
            $data = Dosens::where('nidn','=',$id)->first();
            $prodi = Prodi::get();
            return view('dosen/edit_dosen',compact('data','prodi'));
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
            'nidn'=> $request->nidn,
            'pendidikan'=> $request->pendidikan,
            'golongan'=> $request->golongan,
            'prodi'=> $request->prodi,
            'jab_fungsional'=> $request->jab,
        );
        Dosens::where('nidn',$id)->update($data);
        return redirect()->action([Dosen::class,'index']);
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
       Dosens::where('nidn',$id)->delete();
        return redirect()->action([Dosen::class,'index']);
    }
}
