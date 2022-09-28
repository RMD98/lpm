@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800" style="text-align :center"><?php echo $data->nama ?></h1>
        </div>
        <div class="card-body">
            <div class="row" style="border-bottom-width :3px; border-bottom-style: solid; border-bottom-color:black;" >
                <div class="ml-4" style="width:50%">
                    <p>Nama Resmi Lembaga: <?php echo $data->nama?></p>
                    <p>Ketua : {{$data->nama_ketua}} - {{$data->nidn}}</p>
                    <p>Alamat :<?php echo $data->alamat?></p>
                    <p>No. Telepon: <?php echo $data->no_telp?></p>
                    <p>No. Fax : <?php echo $data->no_fax?></p>
                </div>
                <div class="ml-5">
                    <p>E-mail : <?php echo $data->email?></p>
                    <p>Url : <?php echo $data->url?></p>
                    <p>No. SK. : <?php echo $data->no_sk?></p>
                    <p>SK :
                        @if ($data->sk_pendirian !=NULL )
                            <td>
                                <a href="/kelembagaan/download/sk/{{$data->id}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    <i class="fas fa-download fa-sm text-white-50"></i>
                                    Download
                                </a>
                                <a href="/kelembagaan/sk/{{$data->id}}" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    <i class="fas fa-eye fa-sm text-white-50"></i>
                                    Show
                                </a>
                            </td>
                        @else 
                            <td>
                                Tidak Ada FIle SK
                            </td>
                        @endif
                    <p>No. SK. Resentra : <?php echo $data->no_sk_resentra?></p>
                    <p>SK. Resentra : 
                        @if ($data->resentra !=NULL )
                            <td>
                                <a href="/kelembagaan/download/res/{{$data->id}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    <i class="fas fa-download fa-sm text-white-50"></i>
                                    Download
                                </a>
                                <a href="/kelembagaan/res/{{$data->id}}" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    <i class="fas fa-eye fa-sm text-white-50"></i>
                                    Show
                                </a>
                            </td>
                        @else 
                            <td>
                                Tidak Ada FIle SK
                            </td>
                        @endif
                </div>
            </div>
            <div>
                <div class="ml-2 mt-4">
                    <p><b>Tahun :<?php echo $data->tahun?></b></p>
                </div>
                <div>
                    <h2>Nilai Kelayakan Kantor</h2>
                    <div class="ml-4">
                        <h5>
                            <p>Ruang Pimpinan : {{$data->ruang_pimpinan}}</p>
                            <p>Ruang Administrasi : {{$data->ruang_administrasi}}</p>
                            <p>Ruang Penyimpanan Arsip : {{$data->ruang_penyimpanan_arsip}}</p>
                            <p>Ruang Pertemuan : {{$data->ruang_pertemuan}}</p>
                            <p>Ruang Seminar : {{$data->ruang_seminar}}</p>
                        </h5>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop