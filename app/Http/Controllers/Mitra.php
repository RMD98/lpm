<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitrapkm;
use App\Models\Mitra as Mitras;
use App\Models\Mitraub;
use App\Models\Mitrahukum;

class Mitra extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mitrapkm($id){
        $data = Mitrapkm::where('id_pkm','=',$id)->get();
        return view('pkm/mitra',['data'=>$data,'id'=>$id]);
    }

    public function upsirtmitrapkm($id,Request $request){
        if($request->ids){
            foreach($request->ids as $key=>$value){
                $up = array(
                    'nama' =>$request->nama[$key],
                    'jenis' =>$request->jenis[$key],
                    'alamat' =>$request->alamat[$key],
                    'jarak' =>$request->jarak[$key],
                );
                Mitras::upsert($up,'id');
                $ups = array(
                    'jenis' =>$request->jenis[$key],
                    'manfaat' =>$request->manfaat[$key],
                );
                Mitrapkm::upsert($ups,['id','id_pkm']);
            }
        }
        if($request->namabru){
            foreach($request->namabru as $key=>$value){
                $up = array(
                    'nama' =>$request->namabru[$key],
                    'jenis' =>$request->jenisbru[$key],
                    'alamat' =>$request->alamatbru[$key],
                    'jarak' =>$request->jarakbru[$key],
                );
                $mitra = Mitras::updateOrCreate($up);
                $ups = array(
                    'jenis' =>$request->jenisbru[$key],
                    'manfaat' =>$request->manfaatbru[$key],
                    'id_pkm' =>$id,
                    'id_mitra'=> $mitra->id,
                );
                Mitrapkm::upsert($ups,['id','id_pkm']);
            }
        }
        return redirect()->action([Pkm::class,'show'],['id'=>$id]);
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
    public function destroy($id,$ids)
    {
        Mitrapkm::where('id_mitra','=',$id)->where('id_pkm','=',$ids)->delete();
        return redirect()->action([Pkm::class,'show'],['id'=>$ids]);
    }
}
