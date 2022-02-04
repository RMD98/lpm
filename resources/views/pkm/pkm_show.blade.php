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
            <div class="row">
                <div class="ml-4 mt-3">
                    <p>Ketua (Penulis) :
                        &nbsp
                        <a href="/edit_pkm/<?php echo $data->id ?>">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
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
                                <tr>
                                    <td>{{$ketua->nama}}</td>
                                    <td>{{$ketua->nidn}}</td>
                                    <td>{{$ketua->prodi}}</td>
                                    <td>{{$ketua->pendidikan}}</td>
                                    <td>{{$ketua->jab_fungsional}}</td>
                                    <td>{{$ketua->golongan}}</td>
                                </tr>
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
                        <a href="/pkm/alm/<?php echo $data->id ?>">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
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
            
    </div>
</div>
@stop