@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Luaran Mitra Berbadan Hukum</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/editpkm/luaran/mitrahukum/{{$id}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row" id="isian">
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2 mt-2 card shadows">
                    <input type="text" hidden class="form-control" id="ids" name="ids" value="{{count($data) == 0 ? '' : $data[0]->id}}">
                    <p><b>Nama</b>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{count($data) == 0 ? '' : $data[0]->nama}}"
                        placeholder="Nama">
                    </p>
                    <p><b>Nomor Badan Hukum</b>
                        <input type="text" class="form-control" id="nohuk" name="nohuk" value="{{count($data) == 0 ? '': $data[0]->no_badan_hukum}}"
                        placeholder="Nomor Badan Hukum">
                    </p>
                    <p><b>Bidang Usaha</b>
                        <input type="text" class="form-control" id="bidang" name="bidang" value="{{count($data) == 0 ? '' : $data[0]->bidang_usaha}}"
                        placeholder="Bidang Usaha">
                    </p>
                    <p><b>Bukti</b>
                        @if(count($data) != 0)
                            @if($data[0]->bukti !=NULL)
                                <a href="/fas_down/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    <i class="fas fa-download fa-sm text-white-50"></i>
                                Download</a>
                                <a href="/fas_file/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    <i class="fas fa-eye fa-sm text-white-50"></i>
                                Show</a>
                                <input type="file" name="" id="">
                            @else
                                <input type="file" class="form-control" id="bukti" name="bukti" 
                                placeholder="Deskripsi">
                            @endif
                        @else
                            <input type="file" class="form-control" id="bukti" name="bukti">
                        @endif
                    </p>
                </div>
            </div>
            <button class="ml-2" type="submit">Submit</button>
        </form>
    </div>
</div>
@stop