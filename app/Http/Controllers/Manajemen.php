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
                $data[$value->tahun] = Manajemens::where('tahun','=',$value->tahun)->orderBy('key','asc')->get(); 
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
            if($file){
                $kon = array_diff_key($request->konsistensi,$file);
                foreach($file as $key=>$value){
                    $namasop = $this->sop($key);
                    $data = array(
                                    'nama_sop'=> $namasop,
                                    'konsistensi' => $request->konsistensi[$key],
                                    'file' => $value->store('public/Manajemen Pengabdian/'.$tahun),
                                    'tahun' => $tahun,
                                    'key' => $key,
                                );
                    Manajemens::insert($data);
                }
            } else {
                $kon = $request->konsistensi;
            }
            foreach($kon as $key=>$value){
                $namasop = $this->sop($key);
                $data = array(
                            'nama_sop'=> $namasop,
                            'konsistensi' => $value,
                            'tahun' => $tahun,
                            'key' =>$key,
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
    public function file($id)
    {
        //
        $path = Manajemens::where('id','=',$id)->first();
        $file = \Storage::path($path->file);
        
        return response()->file($file);
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
        if($file){
            $kon = array_diff_key($request->konsistensi,$file);
            foreach($file as $key => $value){
                $namasop = $this->sop($key);
                $old = Manajemens::where('id',$request->id[$key])->first();
                if($old->file){
                    \Storage::move($old->file,'old/'.$old->file);
                }
                $data = array(
                    'nama_sop'=> $namasop,
                    'konsistensi' => $request->konsistensi[$key],
                    'file' => $value->store('Manajemen Pengabdian/'.$tahun),
                    'tahun' => $tahun,
                    'key' => $key,
                );
                Manajemens::where('id',$request->id[$key])->update($data);
    
            }
        }else{
            $kon = $request->konsistensi;
        }
        foreach($kon as $key=>$value){
            $namasop = $this->sop($key);
            $data = array(
                'nama_sop'=> $namasop,
                'konsistensi' => $value,
                'tahun' => $tahun,
                'key' => $key,
            );
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
    public function destroy($tahun)
    {
        //Delete Data dan File
        \Storage::deleteDirectory('public/Manajemen Pengabdian/'.$tahun);
        Manajemens::where('tahun',$tahun)->delete();
        return redirect()->action([Manajemen::class,'index']);
    }

    public function download($id){
        $path = Manajemens::where('id','=',$id)->first();
        $name =$path->nama_sop;
        $tahun = $path->tahun;
        // $name +='.pdf';
        return \Storage::download($path->file,$tahun.'_'.$name.'.pdf');
    }
}
