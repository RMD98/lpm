@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Anggota Dosen Yang Terlibat</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/editpkm/staff/{{$id}}" method="post">
            @csrf
            <div class="form-group row" id="isian">
                @foreach($data as $key=>$value)
                <div class="col-sm-6 mb-3 mb-sm-0 mt-2 ml-4 card shadows">
                    <input type="text" hidden class="form-control" id="ids[{{$key}}]" name="ids[{{$key}}]" value="{{$data[$key]->id}}">
                    <p><b>Nama</b>
                        <input type="text" class="form-control" id="nama[{{$key}}]" name="nama[{{$key}}]" value="{{$data[$key]->nama}}"
                        placeholder="Nama">
                    </p>
                    <p><b>NIDN</b>
                        <input type="text" class="form-control" id="nidn[{{$key}}]" name="nidn[{{$key}}]" value="{{$data[$key]->nidn_nrp}}"
                        placeholder="NIDN">
                    </p>
                    <p><b>Program Studi</b>
                        <input type="text" class="form-control" id="prodi[{{$key}}]" name="prodi[{{$key}}]" value="{{$data[$key]->prodi}}"
                        placeholder="Program Studi">
                    </p>
                    <p><b>Jenjang Pendidikan</b>
                        <input type="text" class="form-control" id="pend[{{$key}}]" name="pend[{{$key}}]" value="{{$data[$key]->pendidikan}}"
                        placeholder="Jenjang Pendidikan">
                    </p>
                    <p><b>Jabatan Fungsional</b>
                        <input type="text" class="form-control" id="jab[{{$key}}]" name="jab[{{$key}}]" value="{{$data[$key]->jab_fungsional}}"
                        placeholder="Jabatan Fungsional">
                    </p>
                    <p><b>Golongan</b>
                        <input type="text" class="form-control" id="gol[{{$key}}]" name="gol[{{$key}}]" value="{{$data[$key]->golongan}}"
                        placeholder="Golongan">
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
                <div class="col-sm-6 mb-3 mb-sm-0 mt-2 ml-4 card shadows">
                    <p><b>Nama</b>
                        <input type="text" class="form-control" id="namabru[`+i+`]" name="namabru[`+i+`]"
                        placeholder="Nama">
                    </p>
                    <p><b>NIDN</b>
                        <input type="text" class="form-control" id="nidnbru[`+i+`]" name="nidnbru[`+i+`]"
                        placeholder="NIDN">
                    </p>
                    <p><b>Program Studi</b>
                        <input type="text" class="form-control" id="prodibru[`+i+`]" name="prodibru[`+i+`]"
                        placeholder="Program Studi">
                    </p>
                    <p><b>Jenjang Pendidikan</b>
                        <input type="text" class="form-control" id="pendbru[`+i+`]" name="pendbru[`+i+`]"
                        placeholder="Jenjang Pendidikan">
                    </p>
                    <p><b>Jabatan Fungsional</b>
                        <input type="text" class="form-control" id="jabbru[`+i+`]" name="jabbru[`+i+`]"
                        placeholder="Jabatan Fungsional">
                    </p>
                    <p><b>Golongan</b>
                        <input type="text" class="form-control" id="golbru[`+i+`]" name="golbru[`+i+`]"
                        placeholder="Golongan">
                    </p>
                </div>`)
            }
    </script>
@stop