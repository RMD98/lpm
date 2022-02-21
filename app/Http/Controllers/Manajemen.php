<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Manajemen as Manajemens;
use App\Models\Unitbisnis;
class Manajemen extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  
            $tahun = Manajemens::groupBy('tahun')->get();
            foreach($tahun as $thn){
                $data[] = Manajemens::where('tahun','=',$thn->tahun)->get(); 
            };
            $data['data'] = $data;
        return view('manajemen/manajemen',['data'=>$data,'tahun'=>$tahun]);
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
        return view('Manajemen/add_manajemen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sop($no){
        switch($no) :
            case(0) :
                $namasop = "Kegiatan Pelatihan Dan Atau Klinik Proposal";
            case(1):
                $namasop = 'Rekrutmen Reviewer Internal';
            case(2):
                $namasop = 'Evaluasi Proposal';
            case(3):
                $namasop = 'Seminar Pembahasan Proposal';
            case(4):
                $namasop = 'Penetapan Pemenang';
            case(5):
                $namasop = 'Kontrak Pelaksanaan PKM';
            case(6):
                $namasop = 'Monitoring Dan Evaluasi Internal';
            case(7):
                $namasop = 'Sistem Penghargaan (Reward Dan Punishment) ';
            case(8):
                $namasop = 'Pelaporan Hasil PKM';
            case(9):
                $namasop = 'Kegiatan Seminar/Pameran Hasil PKM';
            case(10):
                $namasop = 'Proses Penjaminan Mutu';
            case(11):
                $namasop = 'Tindak Lanjut Hasil PKM';
        endswitch;
        return $namasop;
    }
    public function store(Request $request)
    {
            $file = $request->file('file');
            foreach($request->konsistensi as $key=>$value){
                $tahun = $request->$tahun;
                if ($file != NULL){
                    $path[$key] = $file->store(`public/Manajemen Pengabdian/$tahun`);
                } else {
                    $path[$key] = NULL;
                }
                $namasop = $this->sop($key);
                $data = array(
                    'nama_sop'=> $namasop,
                    'konsistensi' => $request->konsistensi[$key],
                    'file' => $path,
                    'tahun' => $tahun,
                );
                Manajemens::insert($data);
            }
            return redirect()->action([Manajemen::class,'index']);
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
        $data = unitbisnis::where('id','=',$id)->get();
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
            $data = Manajemens::where('id','=',$id)->get();
            // $prodi = DB::table('prodi')->get();
            return view('Manajemen/edit_Manajemen',['data'=>$data[0]]);
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
        $file = $request->file('file');
        foreach($request->konsistensi as $key=>$value){
            if ($file != NULL){
                $path[$key] = $file->store(`public/Manajemen Pengabdian/$tahun`);
            } else {
                $path[$key] = NULL;
            }
            $tahun = $request->$tahun;
            $namasop = $this->sop($key);
            $data = array(
                'nama_sop'=> $namasop,
                'konsistensi' => $request->konsistensi[$key],
                'file' => $path,
                'tahun' => $tahun,
            );
            Manajemens::insert($data);
        }
        return redirect()->action([Manajemen::class,'index']);
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
        Manajemens::where('id','=',$id)->delete();
        return redirect()->action([Manajemen::class,'index']);
    }
}
