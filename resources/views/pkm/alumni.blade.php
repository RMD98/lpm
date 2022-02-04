@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Alumni Yang Terlibat</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/editpkm/alm/{{$id}}" method="post">
            @csrf
            <div class="form-group row" id="isian">
                @foreach($data as $key=>$value)
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2 mt-2 card shadows">
                    <input type="text" hidden class="form-control" id="ids[{{$key}}]" name="ids[{{$key}}]" value="{{$data[$key]->id}}">
                    <p><b>Nama</b>
                        <input type="text" class="form-control" id="nama[{{$key}}]" name="nama[{{$key}}]" value="{{$data[$key]->nama}}"
                        placeholder="Nama">
                    </p>
                    <p><b>Pekerjaan</b>
                        <input type="text" class="form-control" id="pekerjaan[{{$key}}]" name="pekerjaan[{{$key}}]" value="{{$data[$key]->pekerjaan}}"
                        placeholder="Pekerjaan">
                    </p>
                    <p><b>Instansi</b>
                        <input type="text" class="form-control" id="instansi[{{$key}}]" name="instansi[{{$key}}]" value="{{$data[$key]->instansi}}"
                        placeholder="Instansi">
                    </p>
                    <p><b>Alamat</b>
                        <input type="text" class="form-control" id="alamat[{{$key}}]" name="alamat[{{$key}}]" value="{{$data[$key]->alamat}}"
                        placeholder="Alamat">
                    </p>
                    <p><b>Nomor HP</b>
                        <input type="text" class="form-control" id="nohp[{{$key}}]" name="nohp[{{$key}}]" value="{{$data[$key]->nohp}}"
                        placeholder="Nomor HP">
                    </p>
                    <p><b>Program Studi</b>
                        <input type="text" class="form-control" id="prodi[{{$key}}]" name="prodi[{{$key}}]" value="{{$data[$key]->prodi}}"
                        placeholder="Program Studi">
                    </p>
                    <p><b>Tahun Lulus</b>
                        <input type="number" class="form-control" id="thn_lulus[{{$key}}]" name="thn_lulus[{{$key}}]" value="{{$data[$key]->thn_lulus}}"
                        placeholder="Tahun Lulus">
                    </p>
                </div>
                @endforeach
            </div>
            <button class="ml-2" type="button" id="tmbh">Tambah</button>
            <button class="ml-2" type="submit">Submit</button>
        </form>
    </div>
</div>
<script language="javascript" type="text/javascript">
            var i = 0;
           document.getElementById("tmbh").onclick = function() {Tambah()};
            // var x = document.querySelector('input[name="Ada"]:checked');
            function Tambah(){
                ++i;
                document.getElementById("isian").insertAdjacentHTML('beforeend',`
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2 mt-2 card shadows">
                    <p><b>Nama</b>
                        <input type="text" class="form-control" id="namabru[`+i+`]" name="namabru[`+i+`]"
                        placeholder="Nama">
                    </p>
                    <p><b>Pekerjaan</b>
                        <input type="text" class="form-control" id="pekerjaanbru[`+i+`]" name="pekerjaanbru[`+i+`]"
                        placeholder="Pekerjaan">
                    </p>
                    <p><b>Instansi</b>
                        <input type="text" class="form-control" id="instansibru[`+i+`]" name="instansibru[`+i+`]"
                        placeholder="Instansi">
                    </p>
                    <p><b>Alamat</b>
                        <input type="text" class="form-control" id="alamatbru[`+i+`]" name="alamatbru[`+i+`]"
                        placeholder="Alamat">
                    </p>
                    <p><b>Nomor HP</b>
                        <input type="text" class="form-control" id="nohpbru[`+i+`]" name="nohpbru[`+i+`]"
                        placeholder="Nomor HP">
                    </p>
                    <p><b>Program Studi</b>
                        <input type="text" class="form-control" id="prodibru[`+i+`]" name="prodibru[`+i+`]"
                        placeholder="Program Studi">
                    </p>
                    <p><b>Tahun Lulus</b>
                        <input type="number" class="form-control" id="thn_lulusbru[`+i+`]" name="thn_lulusbru[`+i+`]"
                    </p>
                </div>
            }
    </script>
@stop