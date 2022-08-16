@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelembagaan Pengabdian</h1>
    <p class="mb-4">Fasilitas yang tersedia .</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/add_kelembagaan" class="btn btn-primary">
                Tambah Data &nbsp
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Nomor S.K. Pendirian</th>
                            <th>Alamat</th>
                            <th>Tahun</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $data): ?>
                        <tr>
                            <td><?php echo $data->nama ?></td>
                            <td><?php echo $data->no_sk ?></td>
                            <td><?php echo $data->alamat ?></td>
                            <td><?php echo $data->tahun ?></td>
                            <td>
                                <a href="/kelembagaan/<?php echo $data->id ?>" class="btn btn-success">SHOW &nbsp<i class="fas fa-eye fa-sm text-white-10"></i></a>
                                <a href="/edit_kelembagaan/<?php echo $data->id ?>" class="btn btn-primary">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
                                <a data-toggle="modal" data-target="#deletemodal<?php echo $data->id ?>" class="btn btn-danger">DELETE <i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <div class="modal fade" id="deletemodal<?php echo $data->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Are you Sure?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Are you sure want to delete data <?php echo $data->nama?>.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-primary" href="/del_kelembagaan/<?php echo $data->id ?>">YES</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop