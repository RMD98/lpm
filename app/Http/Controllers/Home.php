<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use App\Models\Pkm;
use App\Models\Anggota;
use App\Models\Prodi;
use App\Models\Ipteklain;
use App\Models\Haki;
use App\Models\Buku;
use App\Models\Mitrahukum;
use App\Models\Prodtersertifikasi;
use App\Models\Prodterstandarisasi;
use App\Models\Forum;
use App\Models\Mediamassa;
use App\Models\Jurnalint;
use App\Models\Wirausahabarumandiri as wbm;

class Home extends Controller
{
    public function index(){
        $count = $this->ttl();   
        $luaran = $this->luaran();
        // echo $count[0]['ttl'];
        // print_r ($count);
        // $chart = new Chart;
        return view('dashboard',compact('count','luaran'));
    }
    public function ttl(){
        
        $ttl['ttl'] = Pkm::count();
        $mhsa = Anggota::where('status','MAHASISWA')->groupBy('id_pkm')->get();
        $mhs['ttl'] = count($mhsa);
        $smbrs = Pkm::groupBy('sumberdana')->get();
        $smbr['ttl']=[];
        $skala['ttl']=[];
        $roadmap['ttl']=[];
        foreach($smbrs as $key=>$value){
            $smbr['ttl'][$value->sumberdana] = Pkm::where('sumberdana',$value->sumberdana)->count();
        }
        $skalas = Pkm::groupBy('skala')->get('skala');
        foreach ($skalas as $key=>$value){
            $skala['ttl'][$value->skala] = Pkm::where('skala',$value->skala)->count();
        }
        $roadmaps = Pkm::groupBy('roadmap')->get('roadmap');
        foreach ($roadmaps as $key=>$value){
            $roadmap['ttl'][$value->roadmap] = Pkm::where('roadmap',$value->roadmap)->count();
        }
        $faks = Prodi::groupBy('fakultas')->get();
        foreach ($faks as $key=>$value){
            $fakultas = $value->fakultas;
            $fak[$fakultas] = 0;
            $mhs[$fakultas] = 0;
            
            $smbr[$fakultas]=[];
            $smbr['fak']=[];
            
            $skala[$fakultas]=[];
            $skala['fak']=[];
            $roadmap[$fakultas]=[];
            $roadmap['fak']=[];
            
            $prodis = Prodi::where('fakultas',$fakultas)->get();

            foreach($prodis as $key=>$value){
                $prodi = $value->nama;
                $smbr[$prodi]=[];
                $smbr['prod']=[];

                $skala[$prodi]=[];
                $skala['prod']=[];
                
                $roadmap[$prodi]=[];
                $roadmap['prod']=[];
                
                $mhs[$prodi] = 0;
                
                $ang = Anggota::where('jabatan','KETUA')
                ->join('dosens','nidn_nrp','nidn')
                ->where('dosens.prodi','=',$prodi)->get();
                
                $prod[$prodi] = count($ang); 
                $fak[$fakultas] += count($ang);
                
                foreach($ang as $key=>$dos){
                    $mhss[$prodi] = Anggota::where('status','MAHASISWA')
                    ->where('id_pkm',$dos->id_pkm)
                    ->count();
                    if($mhss[$prodi]!=0){
                        $mhs[$prodi] += 1;
                        $mhs[$fakultas] += 1;
                    }
                    $pkm = Pkm::where('id',$dos->id_pkm)->first();                    
                    array_push($smbr['prod'],$pkm->sumberdana);
                    array_push($smbr['fak'],$pkm->sumberdana);
                    
                    array_push($skala['prod'],$pkm->skala);
                    array_push($skala['fak'],$pkm->skala);

                    array_push($roadmap['prod'],$pkm->roadmap);
                    array_push($roadmap['fak'],$pkm->roadmap);
                };

                $smbr[$prodi] = array_count_values($smbr['prod']); 
                $skala[$prodi] = array_count_values($skala['prod']); 
                $roadmap[$prodi] = array_count_values($roadmap['prod']); 

            };
            $smbr[$fakultas] = array_count_values($smbr['fak']); 
            $skala[$fakultas] = array_count_values($skala['fak']); 
            $roadmap[$fakultas] = array_count_values($roadmap['fak']); 
                
        }

        return ['ttl'=> $ttl,'mhs'=>$mhs,'fak'=>$fak,'prod'=>$prod,'smbr'=>$smbr,'skala'=>$skala,'roadmap'=>$roadmap];
    }

    public function luaran(){
        $luaran['iptek'] = Ipteklain::count();
        $luaran['mitra'] = Mitrahukum::count();
        $luaran['prodser'] = Prodtersertifikasi::count();
        $luaran['prodstan'] = Prodterstandarisasi::count();
        $luaran['media'] = Mediamassa::count();
        $luaran['jurnal'] = Jurnalint::count();
        $luaran['wbm'] = wbm::count();
        $luaran['haki'] = Haki::count();
        $luaran['buku'] = Buku::count();
        $luaran['forum'] = Forum::count();

        $luaran['ttl'] = $luaran['iptek'] + $luaran['mitra'] + $luaran['prodser'] + $luaran['prodstan'] + $luaran['media'] + $luaran['jurnal'] + $luaran['wbm'] + $luaran['haki'] + $luaran['buku'] + $luaran['forum'];

        return $luaran;
    }
}
