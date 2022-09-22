@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Prodi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/edtprodi/{{$data->id}}" method="post">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Kode</b>
                        <input type="number" class="form-control" id="kode" name="kode" value="{{$data->kode}}"
                        placeholder="Kode">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nama</b>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}"
                        placeholder="Nama">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Fakultas</b>
                        <select name="fakultas" id="fakultas">
                            @foreach($fakultas as $key=>$value)
                                <option value="{{$value->id}}" {{$value->id==$data->fakultas ? 'selected' : ''}}>{{$value->nama}}</option>
                            @endforeach
                        </select>
                    </p>
                </div>
            </div>
            <button class="ml-2" type="submit">Submit</button>
        </form>
    </div>
</div>
@stop