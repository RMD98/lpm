<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Fasilitas;
use App\Models\Pkm;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        $count = $this->ttl();   
        return view('dashboard',['count'=>$count]);
    }
    public function ttl(){
        // $count = DB::connection('mysql')->select('select count(id) as count from kegiatanpkm');
        $count['ttl'] = DB::table('kegiatanpkm')->count();
        $count['anggota'] = DB::table('anggotapkm')->count();
        return $count;
    }
}
