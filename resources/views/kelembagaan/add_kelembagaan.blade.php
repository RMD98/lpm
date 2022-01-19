@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Kelembagaan Pengabdian</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/addkelembagaan" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <h4 class="mb-2 text-gray-800"><b>Data LPPM</b></h4>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Tahun</b>
                        <input type="number" class="form-control" id="tahun" name="tahun"
                        placeholder="Tahun">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nama Resmi</b>
                        <input type="text" class="form-control" id="nama" name="nama"
                        placeholder="Nama Lab">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nomor S.K. Pendirian</b>
                        <input type="text" class="form-control" id="nosk" name="nosk"
                        placeholder="NO SK Pendirian">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Surat Keterangan</b>
                        <input type="file" id="filesk" accept=".pdf" name="filesk">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Alamat</b>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                        placeholder="Alamat">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nomor Telepone</b>
                        <input type="number" class="form-control" id="nopon" name="nopon"
                        placeholder="Nomor Telepon">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nomor Fax</b>
                        <input type="number" class="form-control" id="nofax" name="nofax"
                        placeholder="Nomor Fax">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Email</b>
                        <input type="email" class="form-control" id="email" name="email"
                        placeholder="Email">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Url</b>
                        <input type="url" class="form-control" id="url" name="url"
                        placeholder="Url">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nomor S.K. Resentra</b>
                        <input type="text" class="form-control" id="nores" name="nores"
                        placeholder="Nomor S.K. Resentra">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Resentra</b>
                        <input type="file" id="fileres" accept=".pdf" name="fileres">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <h4 class="mb-2 text-gray-800"><b>Ketua LPPM</b></h4>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nama Ketua</b>
                        <input type="text" class="form-control" id="namaket" name="namaket"
                        placeholder="Nama Ketua">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>NIDN</b>
                        <input type="number" class="form-control" id="nidn" name="nidn"
                        placeholder="NIDN">
                    </p>
                </div>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <h4 class="mb-2 text-gray-800"><b>Nilai Kelayakan Kantor</b></h4>
                </div>
                <div class="mb-3 mb-sm-0 ml-2">
                    <p ><b class="text-lg">Ruang Pimpinan</b></p>
                    <div class="row">
                        <div class="ml-3">
                            <input class="ml-6" type="radio" id="pimpinan" name="pimpinan" value="Sangat Tidak Memuaskan">
                            <p>Sangat Tidak Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-5" type="radio" id="pimpinan" name="pimpinan" value="Tidak Memuaskan">
                            <p>Tidak Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-2" type="radio" id="pimpinan" name="pimpinan" value="Baik">
                            <p>Baik</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-4" type="radio" id="pimpinan" name="pimpinan" value="Memuaskan">
                            <p>Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-5" type="radio" id="pimpinan" name="pimpinan" value="Sangat Memuaskan">
                            <p>Sangat Memuaskan</p>
                        </div>
                    </div>
                </div>
                <div class="mb-3 mb-sm-0 ml-2">
                    <p><b class="text-lg">Ruang Administrasi</b>
                    <div class="row">
                        <div class="ml-3">
                            <input class="ml-6" type="radio" id="adm" name="adm" value="Sangat Tidak Memuaskan">
                            <p>Sangat Tidak Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-5" type="radio" id="adm" name="adm" value="Tidak Memuaskan">
                            <p>Tidak Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-2" type="radio" id="adm" name="adm" value="Baik">
                            <p>Baik</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-4" type="radio" id="adm" name="adm" value="Memuaskan">
                            <p>Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-5" type="radio" id="adm" name="adm" value="Sangat Memuaskan">
                            <p>Sangat Memuaskan</p>
                        </div>
                    </div>
                </div>
                <div class="mb-3 mb-sm-0 ml-2">
                    <p><b class="text-lg">Ruang Penyimpanan Arsip</b>
                    <div class="row">
                        <div class="ml-3">
                            <input class="ml-6" type="radio" id="arsp" name="arsp" value="Sangat Tidak Memuaskan">
                            <p>Sangat Tidak Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-5" type="radio" id="arsp" name="arsp" value="Tidak Memuaskan">
                            <p>Tidak Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-2" type="radio" id="arsp" name="arsp" value="Baik">
                            <p>Baik</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-4" type="radio" id="arsp" name="arsp" value="Memuaskan">
                            <p>Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-5" type="radio" id="arsp" name="arsp" value="Sangat Memuaskan">
                            <p>Sangat Memuaskan</p>
                        </div>
                    </div>
                </div>
                <div class="mb-3 mb-sm-0 ml-2">
                    <p><b class="text-lg">Ruang Pertemuan</b>
                    <div class="row">
                        <div class="ml-3">
                            <input class="ml-6" type="radio" id="pertemuan" name="pertemuan" value="Sangat Tidak Memuaskan">
                            <p>Sangat Tidak Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-5" type="radio" id="pertemuan" name="pertemuan" value="Tidak Memuaskan">
                            <p>Tidak Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-2" type="radio" id="pertemuan" name="pertemuan" value="Baik">
                            <p>Baik</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-4" type="radio" id="pertemuan" name="pertemuan" value="Memuaskan">
                            <p>Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-5" type="radio" id="pertemuan" name="pertemuan" value="Sangat Memuaskan">
                            <p>Sangat Memuaskan</p>
                        </div>
                    </div>
                </div>
                <div class="mb-3 mb-sm-0 ml-2">
                    <p><b class="text-lg">Ruang Seminar</b>
                    <div class="row">
                        <div class="ml-3">
                            <input class="ml-6" type="radio" id="sem" name="sem" value="Sangat Tidak Memuaskan">
                            <p>Sangat Tidak Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-5" type="radio" id="sem" name="sem" value="Tidak Memuaskan">
                            <p>Tidak Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-2" type="radio" id="sem" name="sem" value="Baik">
                            <p>Baik</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-4" type="radio" id="sem" name="sem" value="Memuaskan">
                            <p>Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-5" type="radio" id="sem" name="sem" value="Sangat Memuaskan">
                            <p>Sangat Memuaskan</p>
                        </div>
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