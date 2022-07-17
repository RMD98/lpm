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
            $data['data'] = [];
            foreach($tahun as $key=>$value){
                $data[$value->tahun] = Manajemens::where('tahun','=',$value->tahun)->get(); 
            };
            // echo $data['data'];
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
                $namasop = "Kegiatan Pelatihan Dan Atau Klinik Proposal"; break;
            case(1):
                $namasop = 'Rekrutmen Reviewer Internal'; break;
            case(2):
                $namasop = 'Evaluasi Proposal'; break;
            case(3):
                $namasop = 'Seminar Pembahasan Proposal'; break;
            case(4):
                $namasop = 'Penetapan Pemenang'; break;
            case(5):
                $namasop = 'Kontrak Pelaksanaan PKM'; break;
            case(6):
                $namasop = 'Monitoring Dan Evaluasi Internal'; break;
            case(7):
                $namasop = 'Sistem Penghargaan (Reward Dan Punishment)'; break;
            case(8):
                $namasop = 'Pelaporan Hasil PKM'; break;
            case(9):
                $namasop = 'Kegiatan Seminar/Pameran Hasil PKM'; break;
            case(10):
                $namasop = 'Proses Penjaminan Mutu'; break;
            case(11):
                $namasop = 'Tindak Lanjut Hasil PKM'; break;
        endswitch;
        return $namasop;
    }
    public function store(Request $request)
    {
            $file = $request->file('file');
            $tahun = $request->tahun;
            if(Manajemens::where('tahun',$tahun)->exists()){
                return redirect()->back()->withErrors(['msg'=>'tahun '.$tahun.' sudah ada dalam database']);
            }
            foreach($request->konsistensi as $key=>$value){
                if ($file != NULL){
                    $path[$key] = $file->store(`public/Manajemen Pengabdian/$tahun`);
                } else {
                    $path[$key] = NULL;
                }
                $namasop = $this->sop($key);

                $data = array(
                    'nama_sop'=> $namasop,
                    'konsistensi' => $request->konsistensi[$key],
                    'file' => $path[$key],
                    'tahun' => $tahun,
                );
                // echo($key);
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
            $data = Manajemens::where('tahun','=',$id)->get();
            // $prodi = DB::table('prodi')->get();
            // echo($data);
            return view('Manajemen/edit_manajemen',['data'=>$data,'tahun'=>$id]);
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
        $tahun = $request->tahun;
        if($tahun != $id){
            if(Manajemens::where('tahun',$tahun)->exists()){
                return redirect()->back()->withErrors(['msg'=>'tahun '.$tahun.' sudah ada dalam database']);
            }
        }
        foreach($request->konsistensi as $key=>$value){
            $namasop = $this->sop($key);
            $data = array(
                'nama_sop'=> $namasop,
                'konsistensi' => $value,
                'tahun' => $tahun,
            );
            if ($file){
                if(current($file)){
                    $data = array_merge_recursive($data,['file'=>current($file)->store(`public/Manajemen Pengabdian/$tahun`)]);
                    next($file);
                }
            } else {
               
            }
            Manajemens::where('id',$request->id[$key])->update($data);
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
