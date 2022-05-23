<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas as fasil;
use App\Models\Prodi;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\Response;

class Fasilitas extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = fasil::get();
        return view('fasilitas/fasilitas',['data'=>$data]);
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
        $data = DB::table('prodi')->get();
        return view('fasilitas/add_fasilitas',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $data = new fasil;
            $data->NamaLab = $request->NamaLab;
            $data->Lingkup = $request->Lingkup;
            $data->SK = $request->file('filesk')->store('public/fasilitas');
            $data->save();
            return redirect()->action([Fasilitas::class,'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $path = fasil::where('id','=',$id)->get();
        $response = \Response::make($path[0]->SK,200);
        $content_types = 'application/pdf';
        header('Content-type : application/pdf');
        $file = \Storage::url($path[0]->SK);

        readfile($path[0]->SK);
        // return $path[0]->SK;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $data = fasil::where('id','=',$id)->get();
            $prodi = DB::table('prodi')->get();
            return view('fasilitas/edit_fasilitas',['data'=>$data,'prodi'=>$prodi]);
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
        $SK = $request->file('filesk')->store('public/fasilitas');
            $data = array (
                'NamaLab' => $request->NamaLab,
                'Lingkup' => $request->Lingkup,
                'SK' => $SK,
            );
            fasil::where('id',$id)->update($data);
            // return $data;
            return redirect()->action([Fasilitas::class,'index']);
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
        fasil::where('id','=',$id)->delete();
        return redirect()->action([Fasilitas::class,'index']);
    }

    public function download($id){
        $path = fasil::where('id','=',$id)->get();
        $name =$path[0]->NamaLab;
        // $name +='.pdf';
        return \Storage::download($path[0]->SK,`$name`);
    }
}
