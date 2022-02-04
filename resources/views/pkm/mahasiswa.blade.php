@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Mahasiswa Yang Terlibat</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/editpkm/mhs/{{$id}}" method="post">
            @csrf
            <div class="form-group row" id="isian">
                @foreach($data as $key=>$value)
                <div class="col-sm-6 mb-3 mb-sm-0 mt-2 ml-4 card shadows">
                    <input type="text" hidden class="form-control" id="ids[{{$key}}]" name="ids[{{$key}}]" value="{{$data[$key]->id}}">
                    <p><b>Nama</b>
                        <input type="text" class="form-control" id="nama[{{$key}}]" name="nama[{{$key}}]" value="{{$data[$key]->nama}}"
                        placeholder="Nama">
                    </p>
                    <p><b>Nrp</b>
                        <input type="text" class="form-control" id="nrp[{{$key}}]" name="nrp[{{$key}}]" value="{{$data[$key]->nidn_nrp}}"
                        placeholder="Nrp">
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
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    
                    <p><b>Nama</b>
                        <input type="text" class="form-control" id="namabru[`+i+`]" name="namabru[`+i+`]"
                        placeholder="Nama">
                    </p>
                    <p><b>Nrp</b>
                        <input type="text" class="form-control" id="nrpbru[`+i+`]" name="nrpbru[`+i+`]"
                        placeholder="Nrp">
                    </p>
                </div>`)
            }
    </script>
@stop