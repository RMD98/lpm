@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Manajemen Pengabdian</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/add_manajemen" class="btn btn-primary">
                Tambah Data &nbsp
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>SOP</th>
                        <th>Kegiatan Pelatihan Dan Atau Klinik Proposal</th>
                        <th>Rekrutmen Reviewer Internal</th>
                        <th>Evaluasi Proposal</th>
                        <th>Seminar Pembahasan Proposal</th>
                        <th>Penetapan Pemenang</th>
                        <th>Kontrak Pelaksanaan PKM</th>
                        <th>Monitoring Dan Evaluasi Internal</th>
                        <th>Sistem Penghargaan (Reward Dan Punishment)</th>
                        <th>Pelaporan Hasil PKM</th>
                        <th>Kegiatan Seminar/Pameran Hasil PKM</th>
                        <th>Proses Penjaminan Mutu</th>
                        <th>Tindak Lanjut Hasil PKM</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($tahun as $key=>$value)
                            <tr>
                                <td>{{$value->tahun}}</td>
                                @foreach($data[$value->tahun] as $key=>$value)
                                    <td>
                                        {{$value->konsistensi}}
                                        <br>
                                        <br>
                                        @if($value->file == NULL)
                                            <b>
                                                <i>
                                                    Tidak Ada file
                                                </i>
                                            </b>
                                        @else
                                        <a href="/man_down/{{$value->id}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                            <i class="fas fa-download fa-sm text-white-50"></i>
                                            Download
                                        </a>
                                        <a href="/man_show/{{$value->id}}" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                            <i class="fas fa-eye fa-sm text-white-50"></i>
                                            Show
                                        </a>
                                        @endif
                                    </td>
                                @endforeach
                                <td>
                                    <a href="/edit_manajemen/{{$value->tahun}}" class="btn btn-primary">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
                                    <a data-toggle="modal" data-target="#deletemodal{{$value->tahun}}" class="btn btn-danger">DELETE <i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <div class="modal fade" id="deletemodal{{$value->tahun}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Are you Sure?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Are you sure want to delete data {{$value->tahun}}.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-primary" href="/del_manajemen/{{$value->tahun}}">YES</a>
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