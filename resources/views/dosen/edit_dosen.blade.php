@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Staff Dosen</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/edtdosen" method="post">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nidn</b>
                        <input type="number" class="form-control" id="nidn" name="nidn" value="{{$data->nidn}}"
                        placeholder="Nidn">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nama</b>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}"
                        placeholder="Nama">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Program Studi</b>
                        <select name="prodi" id="prodi">
                            @foreach($prodi as $key=>$value)
                                <option value="{{$value->nama}}" {{$value->nama==$data->prodi ? 'selected' : ''}}>{{$value->nama}}</option>
                            @endforeach
                        </select>
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Jenjang Pendidikan</b>
                        <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="{{$data->pendidikan}}"
                        placeholder="Pendidikan">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Jabatan Fungsional</b>
                        <input type="text" class="form-control" id="jab" name="jab" value="{{$data->jab_fungsional}}"
                         placeholder="Jabatan Fungsional">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Golongan</b>
                        <input type="text" class="form-control" id="golongan" name="golongan" value="{{$data->golongan}}"
                        placeholder="Golongan">
                    </p>
                </div>
            </div>
            <button class="ml-2" type="submit">Submit</button>
        </form>
    </div>
</div>
<script language="javascript" type="text/javascript">
            document.getElementById("Ada").onchange = function() {file()};
            // var x = document.querySelector('input[name="Ada"]:checked');
            function file(){
                var x = document.getElementById("Ada");
                var y = document.getElementById("filesk");
                if(x.checked){
                    y.disabled = false
                }
                else{
                    y.disabled = true
                }
            }
    </script>
@stop