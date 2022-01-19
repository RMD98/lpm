<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

            $i = 0;
            if($data){
                foreach($data as $dat) {
                    $mitra[] = DB::table('mitra')
                    ->join('mitraub','mitraub.id_mitra','=','mitra.id')
                    ->where('id_ub','=',$dat->id)
                    ->select('mitra.*')
                    ->get();
                };
                $ub['mitra'] =$mitra; 
                return view('unit_bisnis/unit_bisnis',['data'=>$data,'ub'=>$ub]);
            } else{
                return view('unit_bisnis/unit_bisnis',['data'=>$data]);
            }
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
            // $data = new fasil;
            // $data->NamaLab = $request->NamaLab;
            // $data->Lingkup = $request->Lingkup;
            // $data->SK = $request->filessk;
            // $data->save();
            $data = array(
                'nama'=> $request->Namaub,
                'deskripsi'=> $request->Deskripsi,
                'nosk'=> $request->Nosk,
                // 'SKPUB'=> $request->file('Sk')->store('public/Unit Bisnis/SK'),
                // 'LKUB'=> $request->file('Lap')->store('public/Unit Bisnis/Laporan Keuangan'),
                // 'invoice'=> $request->file('inv')->store('public/Unit Bisnis/Invoice'),
            );
            $id = DB::table('unitbisnis')->insertGetId($data);
            $mou = $request->file('mou');
            foreach($mou as $mou){
                $mou->store('public/Unit Bisnis/MOU');
            };
            foreach($request->namamitra as $key=>$value){
                $mitra = array(
                    'id_ub' => $id,
                    'nama'=>$request->namamitra[$key],
                    'mou' =>$mou->store('public/Unit Bisnis/MOU'),
                );
                DB::table('mitraub')->insert($mitra);
            }
            return redirect()->action([Unitbisnis::class,'index']);
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
            $data = DB::table('unitbisnis')->where('id','=',$id)->get();
            // $prodi = DB::table('prodi')->get();
            return view('unit_bisnis/edit_ub',['data'=>$data[0]]);
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
                'Nama'=> $request->nama,
                'Nomor'=> $request->nomor,
                'Tahun'=> $request->tahun,
                'Keterangan'=> $request->keterangan,
                'Dokumen'=> $request->dokumen,
            );
            DB::table('unitbisnis')->where('id',$id)->update($data);
            // return $data;
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
