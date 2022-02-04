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
            <div class="row">
                <div class="ml-4" style="width:50%">
                    <p>Nama Unit Bisnis : <?php echo $data->nama?></p>
                    <p>Nomor S.K. Pendirian: <?php echo $data->nosk?></p>
                    <p> S.K. Pendirian:
                        @if ($data->SKPUB !=NULL )
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-download fa-sm text-white-50"></i>
                            Download</a>
                            @else
                            Tidak Ada FIle SK
                            @endif
                    </p>
                    <p>Deskripsi: <?php echo $data->deskripsi?></p>
                </div>
                <div class="ml-5">
                    @foreach($mitra as $mitra) 
                        <p>Nama Mitra :<?php echo $mitra->nama?></p>
                        <p>MOU : 
                            @if ($data->SKPUB !=NULL )
                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-download fa-sm text-white-50"></i>
                                Download</a>
                            @else
                                Tidak Ada FIle SK
                            @endif</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@stop