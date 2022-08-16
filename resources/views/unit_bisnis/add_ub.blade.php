@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Unit Bisnis</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/addub" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row" id="isian">
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nama Unit Bisnis</b>
                        <input type="text" require class="form-control" id="Namaub" name="Namaub"
                        placeholder="Nama Unit Bisnis">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Deskripsi</b>
                        <input type="text" require class="form-control" id="Deskripsi" name="Deskripsi"
                        placeholder="Deskripsi">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>NO. S.K. Pendirian Unit Bisnis</b>
                        <input type="text" require class="form-control" id="Nosk" name="Nosk"
                        placeholder="NO. S.K.">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>S.K. Pendirian Unit Bisnis</b>
                        <input type="file" class="form-control" accept=".pdf" id="Sk" name="Sk"
                        placeholder="S.K.">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Laporan Keuangan Unit Bisnis</b>
                        <input type="file" class="form-control" accept=".pdf" id="Lap" name="Lap"
                        placeholder="Laporan Keuangan">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Invoive</b>
                        <input type="file" class="form-control" accept=".pdf" id="inv" name="inv"
                        placeholder="Laporan Keuangan">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2" id=mitra>
                    <p><b>Mitra</b>
                        <input type="text" class="form-control" name="namamitra[0]">
                        <input type="file" class="form-control" accept=".pdf" name="mou[0]">
                    </p>
                </div>
            </div>
            <button id="tmbh" type="button">Tambah Mitra</button>
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
                document.getElementById("isian").insertAdjacentHTML('beforeend',`<div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Mitra</b>
                        <input type="text" class="form-control" name="namamitra[`+i+`]">
                        <input type="file" class="form-control" accept=".pdf" name="mou[`+i+`]">
                    </p>
                </div>`)
            }
    </script>
@stop