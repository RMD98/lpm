@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Luaran Iptek Lain</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/editpkm/alm/{{$id}}" method="post">
            @csrf
            <div class="form-group row" id="isian">
                @foreach($data as $key=>$value)
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2 mt-2 card shadows">
                    <input type="text" hidden class="form-control" id="ids[{{$key}}]" name="ids[{{$key}}]" value="{{$data[$key]->id}}">
                    <p><b>Judul</b>
                        <input type="text" class="form-control" id="judul[{{$key}}]" name="judul[{{$key}}]" value="{{$data[$key]->judul}}"
                        placeholder="Judul">
                    </p>
                    <p><b>Nama Penulis</b>
                        <input type="text" class="form-control" id="nama[{{$key}}]" name="nama[{{$key}}]" value="{{$data[$key]->nama}}"
                        placeholder="Nama Penulis">
                    </p>
                    <p><b>NIDN Penulis</b>
                        <input type="text" class="form-control" id="nidn[{{$key}}]" name="nidn[{{$key}}]" value="{{$data[$key]->nidn}}"
                        placeholder="NIDN Penulis">
                    </p>
                    <p><b>Jenis Luaran Iptek Lain</b>
                        <select name="jenis[{{$key}}" id="jenis[{[$key}}]">
                            <option value="Teknologi tepat guna" {{$data[$key]->jenis == 'Teknologi tepat guna' ? 'selected' :''}}>
                                Teknologi tepat guna
                            </option>
                            <option value="Model" {{$data[$key]->jenis == 'Model' ? 'selected' :''}}>
                                Model
                            </option>
                            <option value="Purwarupa/prototype" {{$data[$key]->jenis == 'Purwarupa/prototype' ? 'selected' :''}}>
                                Purwarupa/prototype
                            </option>
                            <option value="Karya desain" {{$data[$key]->jenis == 'Karya desain' ? 'selected' :''}}>
                                Karya desain
                            </option>
                            <option value="Seni Kriya" {{$data[$key]->jenis == 'Seni Kriya' ? 'selected' :''}}>
                                Seni Kriya
                            </option>
                            <option value="Bangunan" {{$data[$key]->jenis == 'Bangunan' ? 'selected' :''}}>
                                Bangunan
                            </option>
                            <option value="Arsitektur" {{$data[$key]->jenis == 'Arsitektur' ? 'selected' :''}}>
                                Arsitektur
                            </option>
                        </select>
                    </p>
                    <p><b>Deskripsi</b>
                        <input type="text" class="form-control" id="deskripsi[{{$key}}]" name="deskripsi[{{$key}}]" value="{{$data[$key]->deskripsi}}"
                        placeholder="Deskripsi">
                    </p>
                    <p><b>Bukti</b>
                        @if($data[$key]->bukti !=NULL)
                            <a href="/fas_down/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-download fa-sm text-white-50"></i>
                            Download</a>
                            <a href="/fas_file/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-eye fa-sm text-white-50"></i>
                            Show</a>
                            <input type="file" name="" id="">
                        @else
                            <input type="file" class="form-control" id="deskripsi[{{$key}}]" name="deskripsi[{{$key}}]" value="{{$data[$key]->deskripsi}}"
                            placeholder="Deskripsi">
                        @endif
                    </p>
                </div>
                @endforeach
            </div>
            <button class="ml-2" type="submit">Submit</button>
        </form>
    </div>
</div>
<script language="javascript" type="text/javascript">
@stop