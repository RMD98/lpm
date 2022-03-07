@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800" style="text-align :center"><?php echo $data->judul ?></h1>
        </div>
        <div class="card-body">
            <div class="row" style="border-bottom-width :3px; border-bottom-style: solid; border-bottom-color:black;" >
                <div class="ml-4" style="width:50%">
                    <p>Judul Pkm: <?php echo $data->judul?></p>
                    <p>Bidang :<?php echo $data->bidang?></p>
                    <p>Kesesuain Dengan Roadmap :<?php echo $data->roadmap?></p>
                    <p>Jenis Kegiatan: <?php echo $data->jeniskegiatan?></p>
                    <p>Skala : <?php echo $data->skala?></p>
                    <p>Sumber IPTEK : <?php echo $data->sumberiptek?></p>
                </div>
                <div class="ml-5">
                    <p>Tahun Kegiatan : 
                    @if($data->tahun_mulai==$data->tahun_akhir)
                        <?php echo $data->tahun_mulai?></p>
                    @else
                        <?php echo $data->tahun_mulai;echo '-'; echo $data->tahun_akhir?></p>
                    @endif
                    <p>Dana : <?php echo $data->dana?></p>
                    <p>Sumber Dana : <?php echo $data->sumberdana?></p>
                    <p>Dana Pendamping : <?php echo $data->danapendamping?></p>
                    <p>Labolatorium : <?php echo $data->lab?></p>
                    <p>Kelengkapan : <?php echo $data->kelengkapan?></p>
                </div>
            </div>
            <div class="ml-2 mt-3">
                <h3>Anggota</h3>
            </div>
            <div class="" style="border-bottom-width :3px; border-bottom-style: solid; border-bottom-color:black;">
                <div class="ml-4 mt-3">
                    <p>Ketua (Penulis) :
                        &nbsp
                        <a href="/pkm/ketua/<?php echo $data->id ?>">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
                        </p>
                    <div class="table-responsive">
                        <table class="table table-border">
                            <thead>
                                <th>Nama</th>
                                <th>NIDN</th>
                                <th>Prgram Studi</th>
                                <th>Jenjang Pendidikan</th>
                                <th>Jabatan Fungsional</th>
                                <th>Golongan</th>
                            </thead>
                            <tbody>
                                @foreach($ketua as $ketua)
                                    <tr>
                                        <td>{{$ketua->nama}}</td>
                                        <td>{{$ketua->nidn}}</td>
                                        <td>{{$ketua->prodi}}</td>
                                        <td>{{$ketua->pendidikan}}</td>
                                        <td>{{$ketua->jab_fungsional}}</td>
                                        <td>{{$ketua->golongan}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    <p>Staff Dosen :
                        &nbsp
                        <a href="/pkm/staff/<?php echo $data->id ?>">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-border">
                            <thead>
                                <th>Nama</th>
                                <th>NIDN</th>
                                <th>Prgram Studi</th>
                                <th>Jenjang Pendidikan</th>
                                <th>Jabatan Fungsional</th>
                                <th>Golongan</th>
                            </thead>
                            <tbody>
                                @foreach($staff as $staff)
                                    <tr>
                                        <td>{{$staff->nama}}</td>
                                        <td>{{$staff->nidn}}</td>
                                        <td>{{$staff->prodi}}</td>
                                        <td>{{$staff->pendidikan}}</td>
                                        <td>{{$staff->jab_fungsional}}</td>
                                        <td>{{$staff->golongan}}</td>
                                        <td><a data-toggle="modal" data-target="#modalstaff<?php echo $staff->id ?>" class="btn btn-danger">DELETE <i class="fas fa-trash"></i></a></td>
                                        <div class="modal fade" id="modalstaff<?php echo $staff->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you Sure?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Are you sure want to delete data <?php echo $staff->nama?>.</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <a class="btn btn-primary" href="/del_pkm/{{$data->id}}/<?php echo $staff->id ?>">YES</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    <p>Mahasiswa :
                        &nbsp
                        <a href="/pkm/mhs/<?php echo $data->id ?>">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
                    </p>
                        <div class="table-responsive">
                            <table class="table table-border">
                                <thead>
                                    <th>Nama</th>
                                    <th>NRP</th>
                                </thead>
                                <tbody>
                                    @foreach($mhs as $mhs)
                                        <tr>
                                            <td>{{$mhs->nama}}</td>
                                            <td>{{$mhs->nidn_nrp}}</td>
                                            <td><a data-toggle="modal" data-target="#modalmhs<?php echo $mhs->id ?>" class="btn btn-danger">DELETE <i class="fas fa-trash"></i></a></td>
                                            <div class="modal fade" id="modalmhs<?php echo $mhs->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you Sure?</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">Are you sure want to delete data <?php echo $mhs->nama?>.</div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <a class="btn btn-primary" href="/del_pkm/{{$data->id}}/<?php echo $mhs->id ?>">YES</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    <p>Alumni :
                        &nbsp
                        <a href="/pkm/luaran['jurnal_internasional'][$key]/<?php echo $data->id ?>">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
                    </p>
                        <div class="table-responsive">
                            <table class="table table-border">
                                <thead>
                                    <th>Nama</th>
                                    <th>Pekerjaan</th>
                                    <th>Instansi</th>
                                    <th>Alamat</th>
                                    <th>Nomor Hp</th>
                                    <th>Prgram Studi</th>
                                    <th>Tahun Lulus</th>
                                </thead>
                                <tbody>
                                   @foreach($alm as $alm)
                                    <tr>
                                        <td>{{$alm->nama}}</td>
                                        <td>{{$alm->pekerjaan}}</td>
                                        <td>{{$alm->instansi}}</td>
                                        <td>{{$alm->alamat}}</td>
                                        <td>{{$alm->nohp}}</td>
                                        <td>{{$alm->prodi}}</td>
                                        <td>{{$alm->thn_lulus}}</td>
                                        <td><a data-toggle="modal" data-target="#modalalm<?php echo $alm->id ?>" class="btn btn-danger">DELETE <i class="fas fa-trash"></i></a></td>
                                        <div class="modal fade" id="modalalm<?php echo $alm->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you Sure?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Are you sure want to delete data <?php echo $alm->nama?>.</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <a class="btn btn-primary" href="/del_pkm/{{$data->id}}/<?php echo $alm->id ?>">YES</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                   @endforeach
                                </tbody>
                                </table>
                        </div>
                </div>
            </div>
            <div class="ml-2 mt-3">
                <h3>Mitra</h3>
                <a href="/pkm/mitra/<?php echo $data->id ?>">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
            </div>
            <div class="" style="border-bottom-width :3px; border-bottom-style: solid; border-bottom-color:black;">
                <div class="table-responsive">
                    <div class="ml-4 mt-3">
                        <table class="table table-border">
                            <thead>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Alamat</th>
                                <th>Jarak</th>
                                <th>Manfaat</th>
                            </thead>
                            <tbody>
                                @foreach($mitra as $mitra)
                                <tr>
                                    <td>{{$mitra->nama}}</td>
                                    <td>{{$mitra->jenis}}</td>
                                    <td>{{$mitra->alamat}}</td>
                                    <td>{{$mitra->jarak}}</td>
                                    <td>{{$mitra->manfaat}}</td>
                                    <td><a data-toggle="modal" data-target="#modalmitra<?php echo $mitra->id ?>" class="btn btn-danger">DELETE <i class="fas fa-trash"></i></a></td>
                                    <div class="modal fade" id="modalmitra<?php echo $mitra->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you Sure?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure want to delete data <?php echo $mitra->nama?>.</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <a class="btn btn-primary" href="/del_pkm/mitra/{{$data->id}}/<?php echo $mitra->id ?>">YES</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="ml-2 mt-3">
                <h3>Luaran</h3>
            </div>
            <div style="border-bottom-width :3px; border-bottom-style: solid; border-bottom-color:black;">
                <div class="ml-4 mt-3">
                    <p>Iptek Lainnya :
                        &nbsp
                        <a href="/pkm/luaran/ipteklain/<?php echo $data->id ?>">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-border">
                            <thead>
                                <th>Judul</th>
                                <th>Nidn Penulis</th>
                                <th>Nama Penulis</th>
                                <th>Jenis</th>
                                <th>Deskripsi</th>
                                <th>Bukti</th>
                            </thead>
                            <tbody>
                                @foreach($luaran['ipteklain'] as $key=>$value)
                                <tr>
                                    <td>{{$luaran['ipteklain'][$key]->judul}}</td>
                                    <td>{{$luaran['ipteklain'][$key]->nidn}}</td>
                                    <td>{{$luaran['ipteklain'][$key]->nama}}</td>
                                    <td>{{$luaran['ipteklain'][$key]->jenis}}</td>
                                    <td>{{$luaran['ipteklain'][$key]->deskripsi}}</td>
                                    <td>
                                        @if($luaran['ipteklain'][$key]->bukti !=NULL)
                                            <a href="/fas_down/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                                <i class="fas fa-download fa-sm text-white-50"></i>
                                            Download</a>
                                            <a href="/fas_file/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                                <i class="fas fa-eye fa-sm text-white-50"></i>
                                            Show</a>
                                        @else
                                           Tidak Ada File
                                        @endif
                                    </td>
                                    <td><a data-toggle="modal" data-target="#modaliptek<?php echo $luaran['ipteklain'][$key]->id ?>" class="btn btn-danger">DELETE <i class="fas fa-trash"></i></a></td>
                                    <div class="modal fade" id="modaliptek<?php echo $luaran['ipteklain'][$key]->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you Sure?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure want to delete data <?php echo $luaran['ipteklain'][$key]->judul?>.</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <a class="btn btn-primary" href="/del_pkm/iptek/{{$data->id}}/<?php echo $luaran['ipteklain'][$key]->id ?>">YES</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                    </div>
                </div>
                <div class="ml-4 mt-3">
                    <p>Haki :
                        &nbsp
                        <a href="/pkm/luaran/haki/<?php echo $data->id ?>">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-border">
                            <thead>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Jenis</th>
                                <th>No. Daftar</th>
                                <th>Status</th>
                                <th>Bukti</th>
                            </thead>
                            <tbody>
                                @foreach($luaran['haki'] as $key=>$value)
                                <tr>
                                    <td>{{$luaran['haki'][$key]->judul}}</td>
                                    <td>
                                        
                                        @foreach($luaran['penulishaki'] as $key=>$value)
                                            <p>
                                                {{$luaran['penulishaki'][$key]->nidn}} - {{$luaran['penulishaki'][$key]->nama}}
                                            </p>
                                        @endforeach
                                    </td>
                                    <td>{{$luaran['haki'][$key]->jenis}}</td>
                                    <td>{{$luaran['haki'][$key]->no_daftar}}</td>
                                    <td>{{$luaran['haki'][$key]->status}}</td>
                                    <td>{{$luaran['haki'][$key]->bukti}}</td>
                                    <td><a data-toggle="modal" data-target="#modalhaki<?php echo $luaran['haki'][$key]->id ?>" class="btn btn-danger">DELETE <i class="fas fa-trash"></i></a></td>
                                    <div class="modal fade" id="modalhaki<?php echo $luaran['haki'][$key]->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you Sure?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure want to delete data <?php echo $luaran['haki'][$key]->nama?>.</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <a class="btn btn-primary" href="/del_pkm/haki/{{$data->id}}/<?php echo $luaran['haki'][$key]->id ?>">YES</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                    </div>
                </div>
                <div class="ml-4 mt-3">
                    <p>Produk Tersertifikasi :
                        &nbsp
                        <a href="/pkm/luaran/prodser/<?php echo $data->id ?>">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-border">
                            <thead>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Instansi</th>
                                <th>No. Keputusan</th>
                                <th>Bukti</th>
                            </thead>
                            <tbody>
                                @foreach($luaran['prod_sertif'] as $key=>$value)
                                <tr>
                                    <td>{{$luaran['prod_sertif'][$key]->judul}}</td>
                                    <td>
                                        
                                        @foreach($luaran['prod_sertif'] as $key=>$value)
                                            <p>
                                                {{$luaran['prod_sertif'][$key]->nidn}} - {{$luaran['prod_sertif'][$key]->nama}}
                                            </p>
                                        @endforeach
                                    </td>
                                    <td>{{$luaran['prod_sertif'][$key]->instansi}}</td>
                                    <td>{{$luaran['prod_sertif'][$key]->no_keputusan}}</td>
                                    <td>{{$luaran['prod_sertif'][$key]->bukti}}</td>
                                    <td><a data-toggle="modal" data-target="#modalprodser<?php echo $luaran['prod_sertif'][$key]->id ?>" class="btn btn-danger">DELETE <i class="fas fa-trash"></i></a></td>
                                    <div class="modal fade" id="modalprodser<?php echo $luaran['prod_sertif'][$key]->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you Sure?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure want to delete data <?php echo $luaran['prod_sertif'][$key]->nama?>.</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <a class="btn btn-primary" href="/del_pkm/prodser/{{$data->id}}/<?php echo $luaran['prod_sertif'][$key]->id ?>">YES</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ml-4 mt-3">
                    <p>Produk Terstandarisasi :
                        &nbsp
                        <a href="/pkm/luaran/prodstan/<?php echo $data->id ?>">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-border">
                            <thead>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Instansi</th>
                                <th>No. Keputusan</th>
                                <th>Bukti</th>
                            </thead>
                            <tbody>
                                @foreach($luaran['prod_standar'] as $key=>$value)
                                <tr>
                                    <td>{{$luaran['prod_standar'][$key]->judul}}</td>
                                    <td>
                                        
                                        @foreach($luaran['prod_standar'] as $key=>$value)
                                            <p>
                                                {{$luaran['prod_standar'][$key]->nidn}} - {{$luaran['prod_standar'][$key]->nama}}
                                            </p>
                                        @endforeach
                                    </td>
                                    <td>{{$luaran['prod_standar'][$key]->instansi}}</td>
                                    <td>{{$luaran['prod_standar'][$key]->no_keputusan}}</td>
                                    <td>{{$luaran['prod_standar'][$key]->bukti}}</td>
                                    <td><a data-toggle="modal" data-target="#modalprodstan<?php echo $luaran['prod_standar'][$key]->id ?>" class="btn btn-danger">DELETE <i class="fas fa-trash"></i></a></td>
                                    <div class="modal fade" id="modalprodstan<?php echo $luaran['prod_standar'][$key]->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you Sure?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure want to delete data <?php echo $luaran['prod_standar'][$key]->nama?>.</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <a class="btn btn-primary" href="/del_pkm/prodstan/{{$data->id}}/<?php echo $luaran['prod_standar'][$key]->id ?>">YES</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ml-4 mt-3">
                    <p>Buku :
                        &nbsp
                        <a href="/pkm/luaran/buku/<?php echo $data->id ?>">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-border">
                            <thead>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Jenis</th>
                                <th>Penerbit</th>
                                <th>ISBN</th>
                                <th>Jumlah Halaman</th>
                                <th>Bukti</th>
                            </thead>
                            <tbody>
                                @foreach($luaran['buku'] as $key=>$value)
                                <tr>
                                    <td>{{$luaran['buku'][$key]->judul}}</td>
                                    <td>
                                        
                                        @foreach($luaran['buku'] as $key=>$value)
                                            <p>
                                                {{$luaran['buku'][$key]->nidn}} - {{$luaran['buku'][$key]->nama}}
                                            </p>
                                        @endforeach
                                    </td>
                                    <td>{{$luaran['buku'][$key]->jenis}}</td>
                                    <td>{{$luaran['buku'][$key]->penerbit}}</td>
                                    <td>{{$luaran['buku'][$key]->isbn}}</td>
                                    <td>{{$luaran['buku'][$key]->jum_halaman}}</td>
                                    <td>{{$luaran['buku'][$key]->bukti}}</td>
                                    <td><a data-toggle="modal" data-target="#modalbuku<?php echo $luaran['buku'][$key]->id ?>" class="btn btn-danger">DELETE <i class="fas fa-trash"></i></a></td>
                                    <div class="modal fade" id="modalbuku<?php echo $luaran['buku'][$key]->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you Sure?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure want to delete data <?php echo $luaran['buku'][$key]->nama?>.</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <a class="btn btn-primary" href="/del_pkm/buku/{{$data->id}}/<?php echo $luaran['buku'][$key]->id ?>">YES</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ml-4 mt-3">
                    <p>Mitra Berbadan Hukum :
                        &nbsp
                        <a href="/pkm/luaran/mitrahukum/<?php echo $data->id ?>">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-border">
                            <thead>
                                <th>Nama</th>
                                <th>No. Badan Hukum</th>
                                <th>Bidang Usaha</th>
                                <th>Bukti</th>
                            </thead>
                            <tbody>
                                @foreach($luaran['mbh'] as $key=>$value)
                                <tr>
                                    <td>{{$luaran['mbh'][$key]->nama}}</td>
                                    <td>{{$luaran['mbh'][$key]->no_badan_hukum}}</td>
                                    <td>{{$luaran['mbh'][$key]->bidang_usaha}}</td>
                                    <td>{{$luaran['mbh'][$key]->bukti}}</td>
                                    <td><a data-toggle="modal" data-target="#modalmbh<?php echo $luaran['mbh'][$key]->id ?>" class="btn btn-danger">DELETE <i class="fas fa-trash"></i></a></td>
                                    <div class="modal fade" id="modalmbh<?php echo $luaran['mbh'][$key]->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you Sure?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure want to delete data <?php echo $luaran['mbh'][$key]->nama?>.</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <a class="btn btn-primary" href="/del_pkm/mitrahukum/{{$data->id}}/<?php echo $luaran['mbh'][$key]->id ?>">YES</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ml-4 mt-3">
                    <p>Pemakalah di Forum Ilmiah :
                        &nbsp
                        <a href="/pkm/luaran/forum/<?php echo $data->id ?>">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-border">
                            <thead>
                                <th>Judul Makalah </th>
                                <th>Penulis</th>
                                <th>Judul Forum Ilmiah</th>
                                <th>Tingkat</th>
                                <th>ISBN</th>
                                <th>Penyelenggara</th>
                                <th>Tanggal Diselenggarakan</th>
                                <th>Tempat</th>
                                <th>Bukti</th>
                            </thead>
                            <tbody>
                                @foreach($luaran['forum_ilmiah'] as $key=>$value)
                                <tr>
                                    <td>{{$luaran['forum_ilmiah'][$key]->judul}}</td>
                                    <td>
                                        
                                        @foreach($luaran['penulismakalah'] as $key=>$value)
                                        <p>
                                            {{$luaran['penulismakalah'][$key]->nidn}} - {{$luaran['penulismakalah'][$key]->nama}}
                                        </p>
                                        @endforeach
                                    </td>
                                    <td>{{$luaran['forum_ilmiah'][$key]->judul_forum}}</td>
                                    <td>{{$luaran['forum_ilmiah'][$key]->tingkat}}</td>
                                    <td>{{$luaran['forum_ilmiah'][$key]->isbn}}</td>
                                    <td>{{$luaran['forum_ilmiah'][$key]->penyelenggara}}</td>
                                    <td>{{$luaran['forum_ilmiah'][$key]->dari}} - {{$luaran['forum_ilmiah'][$key]->sampai}}</td>
                                    <td>{{$luaran['forum_ilmiah'][$key]->tempat}}</td>
                                    <td>{{$luaran['forum_ilmiah'][$key]->bukti}}</td>
                                    <td><a data-toggle="modal" data-target="#modalforum<?php echo $luaran['forum_ilmiah'][$key]->id ?>" class="btn btn-danger">DELETE <i class="fas fa-trash"></i></a></td>
                                    <div class="modal fade" id="modalforum<?php echo $luaran['forum_ilmiah'][$key]->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you Sure?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure want to delete data <?php echo $luaran['forum_ilmiah'][$key]->nama?>.</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <a class="btn btn-primary" href="/del_pkm/forum/{{$data->id}}/<?php echo $luaran['forum_ilmiah'][$key]->id ?>">YES</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ml-4 mt-3">
                    <p>Media Massa :
                        &nbsp
                        <a href="/pkm/luaran/media/<?php echo $data->id ?>">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-border">
                            <thead>
                                <th>Judul</th>
                                <th>URL</th>
                                <th>Penulis</th>
                                <th>Nama Media</th>
                                <th>Jenis</th>
                                <th>Volume</th>
                                <th>Nomor</th>
                                <th>Halaman</th>
                                <th>Tanggal Terbit</th>
                                <th>Skala</th>
                                <th>Bukti</th>
                            </thead>
                            <tbody>
                                @foreach($luaran['media_massa'] as $key=>$value)
                                <tr>
                                    <td>{{$luaran['media_massa'][$key]->judul}}</td>
                                    <td>{{$luaran['media_massa'][$key]->url}}</td>
                                    <td>
                                        @foreach($luaran['media_massa'] as $key=>$value)
                                            <p>
                                                {{$luaran['media_massa'][$key]->nidn}} - {{$luaran['media_massa'][$key]->nama}}
                                            </p>
                                        @endforeach
                                    </td>
                                    <td>{{$luaran['media_massa'][$key]->nama_media}}</td>
                                    <td>{{$luaran['media_massa'][$key]->jenis}}</td>
                                    <td>{{$luaran['media_massa'][$key]->volume}}</td>
                                    <td>{{$luaran['media_massa'][$key]->nomor}}</td>
                                    <td>{{$luaran['media_massa'][$key]->hal}}</td>
                                    <td>{{$luaran['media_massa'][$key]->tgl_terbit}}</td>
                                    <td>{{$luaran['media_massa'][$key]->skala}}</td>
                                    <td>{{$luaran['media_massa'][$key]->bukti}}</td>
                                    <td><a data-toggle="modal" data-target="#modalalm<?php echo $luaran['media_massa'][$key]->id ?>" class="btn btn-danger">DELETE <i class="fas fa-trash"></i></a></td>
                                    <div class="modal fade" id="modalalm<?php echo $luaran['media_massa'][$key]->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you Sure?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure want to delete data <?php echo $luaran['media_massa'][$key]->nama?>.</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <a class="btn btn-primary" href="/del_pkm/media/{{$data->id}}/<?php echo $luaran['media_massa'][$key]->id ?>">YES</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ml-4 mt-3">
                    <p>Wirausaha Baru Mandiri :
                        &nbsp
                        <a href="/pkm/luaran/wbm/<?php echo $data->id ?>">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-border">
                            <thead>
                                <th>Nama Wirausahawan</th>
                                <th>Jenis Usaha</th>
                                <th>Bukti</th>
                            </thead>
                            <tbody>
                                @foreach($luaran['wbm'] as $key=>$value)
                                <tr>
                                    <td>{{$luaran['wbm'][$key]->nama}}</td>
                                    <td>{{$luaran['wbm'][$key]->jenis}}</td>
                                    <td>{{$luaran['wbm'][$key]->bukti}}</td>
                                    <td><a data-toggle="modal" data-target="#modalwbm<?php echo $luaran['wbm'][$key]->id ?>" class="btn btn-danger">DELETE <i class="fas fa-trash"></i></a></td>
                                    <div class="modal fade" id="modalwbm<?php echo $luaran['wbm'][$key]->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you Sure?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Are you sure want to delete data <?php echo $luaran['wbm'][$key]->nama?>.</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <a class="btn btn-primary" href="/del_pkm/wbm/{{$data->id}}/<?php echo $luaran['wbm'][$key]->id ?>">YES</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ml-4 mt-3">
                        <p><b>Jurnal Intrernasional :</b> 
                            &nbsp
                            <a href="/pkm/luaran/jurnal/<?php echo $data->id ?>">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-border">
                                <thead>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Nama Jurnal</th>
                                    <th>Jenis</th>
                                    <th>URL</th>
                                    <th>P-ISSN</th>
                                    <th>E-ISSN</th>
                                    <th>Volume</th>
                                    <th>Nomor</th>
                                    <th>Halaman</th>
                                    <th>Bukti</th>
                                </thead>
                                <tbody>
                                    @foreach($luaran['jurnal_internasional'] as $key=>$value)
                                    <tr>
                                        <td>{{$luaran['jurnal_internasional'][$key]->judul}}</td>
                                        <td>
                                            
                                            @foreach($luaran['penulisjurna;'] as $key=>$value)
                                                <p>
                                                    {{$luaran['penulisjurna;'][$key]->nidn}} - {{$luaran['penulisjurna;'][$key]->nama}}
                                                </p>
                                            @endforeach
                                        </td>
                                        <td>{{$luaran['jurnal_internasional'][$key]->nama_jurnal}}</td>
                                        <td>{{$luaran['jurnal_internasional'][$key]->jenis}}</td>
                                        <td>{{$luaran['jurnal_internasional'][$key]->url}}</td>
                                        <td>{{$luaran['jurnal_internasional'][$key]->p_issn}}</td>
                                        <td>{{$luaran['jurnal_internasional'][$key]->e_issn}}</td>
                                        <td>{{$luaran['jurnal_internasional'][$key]->volume}}</td>
                                        <td>{{$luaran['jurnal_internasional'][$key]->nomor}}</td>
                                        <td>{{$luaran['jurnal_internasional'][$key]->halaman}}</td>
                                        <td>{{$luaran['jurnal_internasional'][$key]->bukti}}</td>
                                        <td><a data-toggle="modal" data-target="#modaljurnal<?php echo $luaran['jurnal_internasional'][$key]->id ?>" class="btn btn-danger">DELETE <i class="fas fa-trash"></i></a></td>
                                        <div class="modal fade" id="modaljurnal<?php echo $luaran['jurnal_internasional'][$key]->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you Sure?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Are you sure want to delete data <?php echo $luaran['jurnal_internasional'][$key]->nama?>.</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <a class="btn btn-primary" href="/del_pkm/jurnal/{{$data->id}}/<?php echo $luaran['jurnal_internasional'][$key]->id ?>">YES</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
                
            
    </div>
</div>
@stop