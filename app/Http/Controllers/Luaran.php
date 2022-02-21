<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Controllers\Pkm;
use App\Models\Luaran as Luarans;
use App\Models\Ipteklain;

class Luaran extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function iptek($id){
        $luaran= Luaran::where('id_pkm','=',$id)->get();
        $data = Ipteklain::where('id','=',$luaran[0]->iptek_lain)
                  ->join('dosen','ipteklain.nidn','=','dosen.nidn')
                  ->get();
        return view('pkm/luaran/ipteklain',['data'=>$data,'id'=>$id]);
    }
    public function upsirtiptek($id,Request $request){
        if ($request->ids){
            $file = $request->file('bukti');
            foreach($request->ids as $key=>$value){
                if($file != NULL){
                    $path = $file->store('public/luaran/ipteklain');
                } else{
                    $path = NULL;
                }
                $up = array(
                    'judul' => $request->judul[$key],
                    'nidn' => $request->nidn[$key],
                    'jenis' => $request->jenis[$key],
                    'deskripsi' => $request->deskripsi[$key],
                    'bukti' => $path,
                );
                Ipteklain::upsirt($up,'id');
            };
        };
        return redirect()->action([Pkm::class,'index'],['id',$id]);
    }
    public function index()
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
