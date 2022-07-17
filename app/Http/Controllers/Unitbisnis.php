<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mitraub;

class Unitbisnis extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $data = DB::table('unitbisnis as ub')
                    ->get();
            $ub = DB::table('mitraubs')->get();
            return view('unit_bisnis/unit_bisnis',compact('data','ub'));
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
        return view('unit_bisnis/add_ub');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            if($request->file('Sk') != NULL){
                $Sk = $request->file('Sk')->store('public/Unit Bisnis/SK');
            } else {
                $Sk = NULL;
            }
            if($request->file('Lap') != NULL){
                $Lap = $request->file('Lap')->store('public/Unit Bisnis/Laporan');
            } else {
                $Lap = NULL;
            }
            if($request->file('inv') != NULL){
                $inv = $request->file('inv')->store('public/Unit Bisnis/Invoice');
            } else {
                $inv = NULL;
            }
            $data = array(
                'nama'=> $request->Namaub,
                'deskripsi'=> $request->Deskripsi,
                'nosk'=> $request->Nosk,
                'SKPUB'=> $Sk,
                'LKUB'=> $Lap,
                'invoice'=> $inv,
            );
            $id = DB::table('unitbisnis')->insertGetId($data);
            $mou = $request->file('mou');
            foreach($mou as $key=>$value){
                if($mou != NULL){
                    $file[$key] = $value->store('public/Unit Bisnis/MOU');
                } else {
                    $file = NULL;
                }
            };
            foreach($request->namamitra as $key=>$value){
                $mitra = array(
                    'id_ub' => $id,
                    'nama'=>$request->namamitra[$key],
                    'mou' => $file[$key],
                );
                Mitraub::insert($mitra);
            }
            return redirect()->action([Unitbisnis::class,'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = DB::table('unitbisnis')->where('id','=',$id)->get();
        $mitra = DB::table('mitraubs')->where('id_ub','=',$id)->get();
        return view('unit_bisnis/unit_bisnis_show',['data'=>$data[0],'mitra'=>$mitra]);
    }

    public function file($id)
    {
        //
        $data = DB::table('unitbisnis')->where('id','=',$id)->get();
        $file = $data[0]->SKPUB;
        $response = \Response::make($file,200);
        $content_types = 'application/pdf';
        $response->header('Content-Type',$content_types);
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $data = DB::table('unitbisnis')->where('id','=',$id)->first();
            $mitra = DB::table('mitraubs')->where('id_ub',$id)->get();
            return view('unit_bisnis/edit_ub',compact('data','mitra'));
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
            'nama'=> $request->Namaub,
            'deskripsi'=> $request->Deskripsi,
            'nosk'=> $request->Nosk,
        );
        if($request->file('Sk') != NULL){
            $Sk = $request->file('Sk')->store('public/Unit Bisnis/SK');
            $data = array_merge_recursive($data,['SKPUB'=> $Sk]);
            
        } else {
            $Sk = NULL;
        }
        if($request->file('Lap') != NULL){
            $Lap = $request->file('Lap')->store('public/Unit Bisnis/Laporan');
            $data = array_merge_recursive($data,['LKUB'=> $Lap]);
        } else {
            $Lap = NULL;
        }
        if($request->file('inv') != NULL){
            $inv = $request->file('inv')->store('public/Unit Bisnis/Invoice');
            $data = array_merge_recursive($data,['invoice'=> $inv]);
        } else {
            $inv = NULL;
        }
        
        DB::table('unitbisnis')->where('id',$id)->update($data);
        $mou = $request->file('mou');
        foreach($request->id as $key=>$value){
            $mitra = array(
                'nama'=>$request->namamitra[$key],
            );
            if($mou){
                if(current($mou)){
                    $mitra = array_merge_recursive($mitra,['mou'=> current($mou)->store('public/Unit Bisnis/MOU')]);
                    next($mou);
                }
            }
            Mitraub::where('id',$value)->update($mitra);
        }
        if($request->mitrabaru){

            foreach($request->mitrabaru as $key=>$value){
                if($request->file('moubaru')[$key] != NULL){
                $file = $request->file('moubaru')[$key]->store('public/Unit Bisnis/MOU');
                } else {
                    $file = NULL;
                }
                $baru = array(
                    'id_ub' => $id,
                    'nama'=>$request->mitrabaru[$key],
                    'mou' =>$file
                );
                Mitraub::insert($baru);
            }
        }
        return redirect()->action([Unitbisnis::class,'index']);
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
        DB::table('unitbisnis')->where('id','=',$id)->delete();
        return redirect()->action([Unitbisnis::class,'index']);
    }
}
