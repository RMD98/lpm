@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Fasilitas Pendukung</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/addstandar" method="post">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nama</b>
                        <input type="text" class="form-control" id="nama" name="nama"
                        placeholder="Nama">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nomor</b>
                        <input type="number" class="form-control" id="nomor" name="nomor"
                        placeholder="Nomor">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Tahun</b>
                        <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Tahun">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Keterangan</b>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Dokumen</b>
                        <label for="dokumen">
                            <input type="file" id="dokumen" name="dokumen" >
                        </label>
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