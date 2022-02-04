@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Kegiatan PKM</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/addpkm" method="post">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Judul</b>
                        <input type="text" class="form-control" id="judul" name="judul"
                        placeholder="Judul">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Sesuai Dengan Roadmap?</b>
                        &nbsp
                        <label for="roadmap">
                            <input type="radio" id="roadmap" name="roadmap" value="Ya"> Ya
                            <input type="radio" id="roadmap" name="roadmap" value="Tidak"> Tidak
                        </label>
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Bidang</b>
                        <input type="text" class="form-control" id="bidang" name="bidang"
                        placeholder="Bidang">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Jenis Kegiatan</b>
                        &nbsp
                        <select name="jenis" id="jenis">
                            <option value="Insidental">Insidental < 1 bln</option>
                            <option value="Non-Insidental">Non-Insidental 1 - 6 bln</option>
                        </select>
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Tingkat Penyelenggaraan Kegiatan</b>
                        &nbsp
                        <select name="skala" id="skala">
                            <option value="Local">Local</option>
                            <option value="Nasional">Nasional</option>
                        </select>
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Jumlah Dana</b>
                    <input type="number" class="form-control" id="dana" name="dana"
                    placeholder="Jumlah Dana">
                </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Sumber Dana</b>
                    &nbsp
                    <select name="sumber" id="sumber">
                        <option value="Mandiri">Mandiri</option>
                        <option value="Internal PT">Internal PT</option>
                        <option value="Dikti">Dikti</option>
                        <option value="Lembaga Nasional Selain Dikti">Lembaga Nasional Selain Dikti</option>
                        <option value="Lembaga Luar Negri">Lembaga Luar Negri</option>
                    </select>
                </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Tahun Kegiatan</b>
                        <input type="number" class="form-control" id="t-awal" name="tawal" placeholder="Tahun Awal">
                        &nbsp
                        <input type="number" class="form-control" id="t-akhir" name="takhir" placeholder="Tahun Akhir">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Sumber Daya IPTEK Yang Digunakan</b>
                        <select name="sumberiptek" id="sumberiptek">
                            @foreach($iptek as $iptek)
                                <option value="<?php echo $iptek->sumber?>"><?php echo $iptek->sumber?></option>
                            @endforeach
                        </select>
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Dana Pendamping</b>
                        <input type="number" class="form-control" id="dpend" name="dpend" placeholder="Dana Pendamping">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Laboratorium</b>
                        <input type="text" class="form-control" id="lab" name="lab" placeholder="Laboratorium">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Kelengkapan</b>
                        &nbsp
                        <label for="kelengkapan">
                            <input type="radio" id="kelengkapan" name="kelengkapan" value="Ya"> Ya
                            <input type="radio" id="kelengkapan" name="kelengkapan" value="Tidak"> Tidak
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