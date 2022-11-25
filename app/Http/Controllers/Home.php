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
use DB;

class Home extends Controller
{
    public function index(){
        $tahun = DB::table('pkms')->groupBy('tahun_mulai')->get();
        $count = $this->ttl();   
        $luaran = $this->luaran();
        // echo $count[0]['ttl'];
        // print_r ($count);
        // $chart = new Chart;
        return view('dashboard',compact('count','luaran','tahun'));
    }
    public function prodi($thn){
        $prod = Prodi::get();
        foreach($prod as $key=>$prods){
            $target = DB::table('target_pkms')->where('tahun',$thn)->where('prodi',$prods->id)->value('target');
            $data[$prods->nama]['target']= $target;
            $data[$prods->nama]['mhs'] = 0;
            $data[$prods->nama]['dana'] = [];
            $data[$prods->nama]['skala'] = [];
            $data[$prods->nama]['roadmap'] = [];
            $ang = Anggota::where('jabatan','KETUA')
                            ->join('dosens','nidn','nidn_nrp')
                            ->where('dosens.prodi',$prods->id)
                            ->join('pkms','pkms.id','id_pkm')
                            ->where('tahun_mulai',$thn)
                            ->get();
            $data[$prods->nama]['ttl'] = count($ang);
            foreach($ang as $keys=>$values){
                if(Anggota::where('id_pkm',$values->id_pkm)->where('status','MAHASISWA')->exists()){
                                    $data[$prods->nama]['mhs'] +=1;
                                };
                if(array_key_exists($values->sumberdana,$data[$prods->nama]['dana'])){
                    $data[$prods->nama]['dana'][$values->sumberdana] += 1;
                }else {
                    $data[$prods->nama]['dana'][$values->sumberdana] = 1;
                }
                if(array_key_exists($values->skala,$data[$prods->nama]['skala'])){
                    $data[$prods->nama]['skala'][$values->skala] += 1;
                }else {
                    $data[$prods->nama]['skala'][$values->skala] = 1;
                }
                if(array_key_exists($values->roadmap,$data[$prods->nama]['roadmap'])){
                    $data[$prods->nama]['roadmap'][$values->roadmap] += 1;
                }else {
                    $data[$prods->nama]['roadmap'][$values->roadmap] = 1;
                }
            }
        }
        return $data; 
    }
    public function tahun(Request $request){
        $thn = Pkm::where('tahun_mulai',$request->tahun_awal)->get();
        $target = DB::table('target_pkms')->where('tahun',$request->tahun_awal)->get();
        if($request->group == 'ttl'){
            $data['dana']=[];
            $data['mhs'] = 0;
            $data['skala'] =[];
            $data['roadmap'] = [];
            $data['ttl'] = count($thn);
            $data['target'] = 0;
            foreach($target as $key=>$value){
                $data['target'] += $value->target;
            }
            foreach($thn as $key=>$value){
                if(Anggota::where('id_pkm',$value->id)->where('status','MAHASISWA')->exists()){
                            $data['mhs'] +=1;
                    }
                if(array_key_exists($value->sumberdana,$data['dana'])){
                    $data['dana'][$value->sumberdana] += 1;
                }else {
                    $data['dana'][$value->sumberdana] = 1;
                }
                if(array_key_exists($value->skala,$data['skala'])){
                    $data['skala'][$value->skala] += 1;
                }else {
                    $data['skala'][$value->skala] = 1;
                }
                if(array_key_exists($value->roadmap,$data['roadmap'])){
                    $data['roadmap'][$value->roadmap] += 1;
                }else {
                    $data['roadmap'][$value->roadmap] = 1;
                }
            }
        }
        elseif($request->group == 'prod'){
            $data = $this->prodi($request->tahun_awal);
           
        }
        elseif($request->group == 'fak'){
            $prod = $this->prodi($request->tahun_awal);
            $fak = DB::table('fakultas')->get();
            foreach($fak as $key=>$value){
                $data[$value->nama]['ttl']=0;
                $data[$value->nama]['mhs']=0;
                $data[$value->nama]['target']=0;
                $data[$value->nama]['dana'] = [];
                $data[$value->nama]['skala'] = [];
                $data[$value->nama]['roadmap'] = [];
                $prodi = Prodi::where('fakultas',$value->id)->get();
                foreach($prodi as $keys=>$prods){
                    $data[$value->nama]['ttl'] += $prod[$prods->nama]['ttl'];
                    $data[$value->nama]['mhs'] += $prod[$prods->nama]['mhs'];
                    $data[$value->nama]['target'] += $prod[$prods->nama]['target'];
                    foreach($prod[$prods->nama]['dana'] as $smbr=>$values){
                        if(array_key_exists($smbr,$data[$value->nama]['dana'])){
                            $data[$value->nama]['dana'][$smbr] += 1;
                        }else {
                            $data[$value->nama]['dana'][$smbr] = 1;
                        }
                    }
                    foreach($prod[$prods->nama]['skala'] as $skl=>$values){
                        if(array_key_exists($skl,$data[$value->nama]['skala'])){
                            $data[$value->nama]['skala'][$skl] += 1;
                        }else {
                            $data[$value->nama]['skala'][$skl] = 1;
                        }
                    }

                    foreach($prod[$prods->nama]['roadmap'] as $rd=>$values){
                        if(array_key_exists($rd,$data[$value->nama]['roadmap'])){
                            $data[$value->nama]['roadmap'][$rd] += 1;
                        }else {
                            $data[$value->nama]['roadmap'][$rd] = 1;
                        }
                    }
                }
            }
        } 
        elseif($request->group == 'luar'){
            $luaran = ['Buku','Haki','Media Massa','Produk Tersertifikasi','Produk Terstandarisasi',
                    'Wirausaha Baru Mandiri','Pemakalah Forum Ilmiah','Jurnal Internasional',
                    'Mitra Berbada Hukum','Luaran Iptek Lainnya'];
            $data = array_fill_keys($luaran,0);
            foreach($thn as $key=>$value){
                $temp = DB::table('luarans')->where('id_pkm',$value->id)->first();
                // $luaran['Buku'] += 
                if($temp->buku){
                    $data['Buku'] += 1;
                };
                if($temp->haki){
                    $data['Haki'] += 1;
                };
                if($temp->media_massa){
                    $data['Media Massa'] += 1;
                };
                if($temp->prod_tersertifikasi){
                    $data['Produk Tersertifikasi'] += 1;
                };
                if($temp->prod_terstandarisasi){
                    $data['Produk Terstandarisasi'] += 1;
                };
                if($temp->forum_ilmiah){
                    $data['Pemakalah Forum Ilmiah'] += 1;
                };
                if($temp->jurnal_internasional){
                    $data['Jurnal Internasional'] += 1;
                };
                if($temp->wirausaha_baru_mandiri){
                    $data['Wirausaha Baru Mandiri'] += 1;
                };
                if($temp->mitra_berbadan_hukum){
                    $data['Mitra Berbadan Hukum'] += 1;
                };
                if($temp->iptek_lain){
                    $data['Luaran Iptek Lainnya'] += 1;
                };
            }
        }
        return response()->json($data);
    }
    public function ttl(){
        
        $ttl['ttl'] = Pkm::count();
        $mhsa = Anggota::where('status','MAHASISWA')->groupBy('id_pkm')->select('anggotas.*')->get();
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
