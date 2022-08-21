<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mitraub;

class Unitbisnis extends Controller
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
                $Sk = $request->file('Sk')->store('Unit Bisnis/SK');
            } else {
                $Sk = NULL;
            }
            if($request->file('Lap') != NULL){
                $Lap = $request->file('Lap')->store('Unit Bisnis/Laporan');
            } else {
                $Lap = NULL;
            }
            if($request->file('inv') != NULL){
                $inv = $request->file('inv')->store('Unit Bisnis/Invoice');
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
            //memisahkan data yang memiliki file
            $mit = array_diff_key($request->namamitra,$mou);
            foreach($mou as $key=>$value){
                $mitra = array(
                    'id_ub' => $id,
                    'nama'=>$request->namamitra[$key],
                    'mou' => $value->store('Unit Bisnis/MOU'),
                );
                Mitraub::insert($mitra);
               
            };
    
            foreach($mit as $key=>$value){
                $mitra = array(
                    'id_ub' => $id,
                    'nama'=>$request->namamitra[$key],
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
        $old = DB::table('unitbisnis')->where('id',$id)->first();
        $data = array(
            'nama'=> $request->Namaub,
            'deskripsi'=> $request->Deskripsi,
            'nosk'=> $request->Nosk,
        );
        if($request->file('Sk')){
            //Memindahkan File lama ke folder Old
            \Storage::move($old->Sk,'old/'.$old->Sk);

            //Menyimpan file baru dan memasukan pathnya ke db
            $Sk = $request->file('Sk')->store('Unit Bisnis/SK');
            $data = array_merge_recursive($data,['SKPUB'=> $Sk]);
            
        }
        if($request->file('Lap')){
            //Memindahkan File lama ke folder Old
            \Storage::move($old->LKUB,'old/'.$old->LKUB);

            //Menyimpan file baru dan memasukan pathnya ke db
            $Lap = $request->file('Lap')->store('Unit Bisnis/Laporan');
            $data = array_merge_recursive($data,['LKUB'=> $Lap]);
        }
        if($request->file('inv')){
            //Memindahkan File lama ke folder Old
            \Storage::move($old->Invoice,'old/'.$old->Invoice);

            //Menyimpan file baru dan memasukan pathnya ke db
            $inv = $request->file('inv')->store('Unit Bisnis/Invoice');
            $data = array_merge_recursive($data,['invoice'=> $inv]);
        }
        //update data unit bisnis
        DB::table('unitbisnis')->where('id',$id)->update($data);

        //mengupdate data mitra unit bisnis
        print_r($request->ids);
        if($request->ids){
            $mou = $request->file('mou');
            if($mou){
                //memisahkan data yang memiliki file baru
                $mit = array_diff_key($request->ids,$mou);
                
                //mengupdate data yang memiliki file
                foreach($mou as $key=>$value){
                    $old = Mitraub::where('id',$request->ids[$key])->first();
                    if($old->mou){
                        //memindahkan file lama kedalam folder old
                        \Storage::move($old->mou,'old/'.$old->mou);
                    };
                    $mitra = array(
                        'nama'=>$request->namamitra[$key],
                        'mou'=>$value->store('Unit Bisnis/MOU'),
                    );
                    Mitraub::where('id',$request->ids[$key])->update($mitra);
                }
            } else{
                $mit=$request->ids;
            }

            //mengupdate data tanpa file
            foreach($mit as $key=>$value){
                $mitra = array(
                    'nama'=>$request->namamitra[$key],
                );
                Mitraub::where('id',$request->ids[$key])->update($mitra);
            }
        }
        //menyimpan data mitra unit bisnis baru
        if($request->mitrabaru){
            $moubaru = $request->file('moubaru');
            if($moubaru){
                //memisahkan data yang memiliki file
                $mitb = array_diff_key($request->mitrabaru,$moubaru);
                foreach($moubaru as $key=>$value){
                    $baru = array(
                        'id_ub' => $id,
                        'nama'=>$request->mitrabaru[$key],
                        'mou' =>$value->store('Unit Bisnis/MOU'),
                    );
                    Mitraub::insert($baru);
                }
            } else {
                $mitb = $request->mitrabaru;
            }
            foreach($mitb as $key=>$value){
                $baru = array(
                    'id_ub' => $id,
                    'nama'=>$request->mitrabaru[$key],
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
        $data = DB::table('unitbisnis')->where('id',$id)->first();
        \Storage::delete([$data->SKPUB,$data->LKUB,$data->Invoice]);
        $ub = DB::table('mitraubs')->where('id_ub',$id)->get();
        foreach($ub as $key=>$value){
            \Storage::delete($value->mou);
        }
        DB::table('unitbisnis')->where('id','=',$id)->delete();
        return redirect()->action([Unitbisnis::class,'index']);
    }
}
