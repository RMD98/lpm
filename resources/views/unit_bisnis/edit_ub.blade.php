@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Unit Bisnis</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/edtub/{{$data->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row" id="isian">
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nama Unit Bisnis</b>
                        <input type="text" class="form-control" id="Namaub" name="Namaub" value="<?php echo $data->nama ?>"
                        placeholder="Nama Unit Bisnis">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Deskripsi</b>
                        <input type="text" class="form-control" id="Deskripsi" name="Deskripsi" value="<?php echo $data->deskripsi ?>"
                        placeholder="Deskripsi">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>NO. S.K. Pendirian Unit Bisnis</b>
                        <input type="text" class="form-control" id="Nosk" name="Nosk" value="<?php echo $data->nosk ?>"
                        placeholder="NO. S.K.">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>S.K. Pendirian Unit Bisnis</b>
                        <input type="file" class="form-control" accept=".pdf" id="Sk" name="Sk"
                        placeholder="S.K.">
                        <td>
                                <a href="/ub_file/<?php echo $data->id?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    <i class="fas fa-download fa-sm text-white-50"></i>
                                    Show</a>
                                </td>
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Laporan Keuangan Unit Bisnis</b>
                        <input type="file" class="form-control" accept=".pdf" id="Lap" name="Lap"
                        placeholder="Laporan Keuangan">
                        <label for="lap"><?php echo $data->LKUB ?></label>
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Invoive</b>
                        <input type="file" class="form-control" accept=".pdf" id="inv" name="inv"
                        placeholder="Laporan Keuangan">
                        <label for="inv"><?php echo $data->Invoice ?></label>
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2" id=mitra>
                    @foreach($mitra as $key=>$value)
                        <p><b>Mitra</b>
                            <input type="text" hidden name="id[{{$key}}]" value="{{$value->id}}">
                            <input type="text" class="form-control" name="namamitra[{{$key}}]" value="{{$value->nama}}">
                            <input type="file" class="form-control" accept=".pdf" name="mou[{{$key}}]">
                            <label for="lap"><?php echo $value->mou ?></label>
                        </p>
                    @endforeach
                </div>
            </div>
            <button id="tmbh" type="button">Tambah Mitra</button>
            <button class="ml-2" type="submit">Submit</button>
        </form>
    </div>
</div>
<script language="javascript" type="text/javascript">
            var i = {{count($mitra)-1}};
            document.getElementById("tmbh").onclick = function() {Tambah()};
            // var x = document.querySelector('input[name="Ada"]:checked');
            function Tambah(){
                ++i;
                document.getElementById("isian").insertAdjacentHTML('beforeend',`<div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Mitra</b>
                        <input type="text" class="form-control" name="mitrabaru[`+i+`]">
                        <input type="file" class="form-control" accept=".pdf" name="moubaru[`+i+`]">
                    </p>
                </div>`)
            }
    </script>
@stop