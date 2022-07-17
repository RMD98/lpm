@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Staff Dosen</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/add_dosen" class="btn btn-primary">
                Tambah Data &nbsp
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIDN</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Tingkat Pendidikan</th>
                            <th>Jabatan Fungsional</th>
                            <th>Golongan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key=>$value)
                        <tr>
                            <td>{{ $value->nidn }}</td>
                            <td>{{ $value->nama }}</td>
                            <td>{{ $value->prodi }}</td>
                            <td>{{ $value->pendidikan }}</td>
                            <td>{{ $value->jab_fungsional }}</td>
                            <td>{{ $value->golongan }}</td>
                            <td>
                                <a href="/edit_dosen/{{$value->nidn}}" class="btn btn-primary">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
                                <a data-toggle="modal" data-target="#deletemodal{{$value->nidn}}" class="btn btn-danger">DELETE <i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <div class="modal fade" id="deletemodal{{$value->nidn}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Are you Sure?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Are you sure want to delete data {{$value->nama}}.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-primary" href="/del_dosen/{{$value->nidn}}">YES</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop