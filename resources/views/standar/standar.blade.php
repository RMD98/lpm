@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Standar Pengabdain Kepada Masyarakat (PKM)</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/add_standar" class="btn btn-primary">
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
                            <th>Nomor</th>
                            <th>Tahun</th>
                            <th>Keterangan</th>
                            <th>Dokumen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $data): ?>
                        <tr>
                            <td><?php echo $data->Nama ?></td>
                            <td><?php echo $data->Nomor ?></td>
                            <td><?php echo $data->Tahun ?></td>
                            <td><?php echo $data->Keterangan ?></td>
                            @if ($data->Dokumen !=NULL )
                                <td>
                                    <a href="/standdown/<?php echo $data->id ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                        <i class="fas fa-download fa-sm text-white-50"></i>
                                        Download</a>
                                    <br>
                                    <a href="/standfile/<?php echo $data->id ?>" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                        <i class="fas fa-eye fa-sm text-white-50"></i>
                                        Show</a>
                                </td>
                            @else
                            <td>
                                Tidak Ada FIle SK
                            </td>
                            @endif
                            <td>
                                <a href="/edit_standar/<?php echo $data->id ?>" class="btn btn-primary">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
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
                                    <div class="modal-body">Are you sure want to delete data <?php echo $data->Nama?>.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-primary" href="/del_standar/<?php echo $data->id ?>">YES</a>
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