@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Kelembagaan Pengabdian</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/edt_kelembagaan/{{$data->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <h4 class="mb-2 text-gray-800"><b>Data LPPM</b></h4>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Tahun</b>
                        <input type="number" class="form-control" id="tahun" name="tahun" value = "<?php echo $data->tahun ?>"
                        placeholder="Tahun">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nama Resmi</b>
                        <input type="text" class="form-control" id="nama" name="nama" value = "<?php echo $data->nama ?>"
                        placeholder="Nama Resmi">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nomor S.K. Pendirian</b>
                        <input type="text" class="form-control" id="nosk" name="nosk" value = "<?php echo $data->no_sk ?>"
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
                        <input type="text" class="form-control" id="alamat" name="alamat" value ="<?php echo $data->alamat ?>"
                        placeholder="Alamat">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nomor Telepone</b>
                        <input type="number" class="form-control" id="nopon" name="nopon" value ="<?php echo $data->no_telp ?>"
                        placeholder="Nomor Telepon">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nomor Fax</b>
                        <input type="number" class="form-control" id="nofax" name="nofax" value ="<?php echo $data->no_fax ?>"
                        placeholder="Nomor Fax">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Email</b>
                        <input type="email" class="form-control" id="email" name="email" value = "<?php echo $data->email ?>"
                        placeholder="Email">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Url</b>
                        <input type="url" class="form-control" id="url" name="url" value ="<?php echo $data->url ?>"
                        placeholder="Url">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nomor S.K. Resentra</b>
                        <input type="text" class="form-control" id="nores" name="nores" value="<?php echo $data->no_sk_resentra ?>"
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
                        <input type="text" class="form-control" id="namaket" name="namaket" value="<?php echo $data->nama_ketua ?>"
                        placeholder="Nama Ketua">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>NIDN</b>
                        <input type="number" class="form-control" id="nidn" name="nidn" value="<?php echo $data->nidn ?>"
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
                            <input class="ml-6" type="radio" id="pimpinan" name="pimpinan" {{$data->ruang_pimpinan == 'Sangat Tidak Memuaskan' ? 'checked' : ''}} value="Sangat Tidak Memuaskan">
                            <p>Sangat Tidak Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-5" type="radio" id="pimpinan" name="pimpinan" {{$data->ruang_pimpinan == 'Tidak Memuaskan' ? 'checked' : ''}} value="Tidak Memuaskan">
                            <p>Tidak Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-2" type="radio" id="pimpinan" name="pimpinan" {{$data->ruang_pimpinan == 'Baik' ? 'checked' : ''}} value="Baik">
                            <p>Baik</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-4" type="radio" id="pimpinan" name="pimpinan" {{$data->ruang_pimpinan == 'Memuaskan' ? 'checked' : ''}} value="Memuaskan">
                            <p>Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-5" type="radio" id="pimpinan" name="pimpinan" {{$data->ruang_pimpinan == 'Sangat Memuaskan' ? 'checked' : ''}} value="Sangat Memuaskan">
                            <p>Sangat Memuaskan</p>
                        </div>
                    </div>
                </div>
                <div class="mb-3 mb-sm-0 ml-2">
                    <p><b class="text-lg">Ruang Administrasi</b>
                    <div class="row">
                        <div class="ml-3">
                            <input class="ml-6" type="radio" id="adm" name="adm" {{$data->ruang_administrasi == 'Sangat Tidak Memuaskan' ? 'checked' : ''}} value="Sangat Tidak Memuaskan">
                            <p>Sangat Tidak Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-5" type="radio" id="adm" name="adm" {{$data->ruang_administrasi == 'Tidak Memuaskan' ? 'checked' : ''}} value="Tidak Memuaskan">
                            <p>Tidak Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-2" type="radio" id="adm" name="adm" {{$data->ruang_administrasi == 'Baik' ? 'checked' : ''}} value="Baik">
                            <p>Baik</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-4" type="radio" id="adm" name="adm" {{$data->ruang_administrasi == 'Memuaskan' ? 'checked' : ''}} value="Memuaskan">
                            <p>Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-5" type="radio" id="adm" name="adm" {{$data->ruang_administrasi == 'Sangat Memuaskan' ? 'checked' : ''}} value="Sangat Memuaskan">
                            <p>Sangat Memuaskan</p>
                        </div>
                    </div>
                </div>
                <div class="mb-3 mb-sm-0 ml-2">
                    <p><b class="text-lg">Ruang Penyimpanan Arsip</b>
                    <div class="row">
                        <div class="ml-3">
                            <input class="ml-6" type="radio" id="arsp" name="arsp" {{$data->ruang_penyimpanan_arsip == "Sangat Tidak Memuaskan" ? 'checked' : ''}} value="Sangat Tidak Memuaskan">
                            <p>Sangat Tidak Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-5" type="radio" id="arsp" name="arsp" {{$data->ruang_penyimpanan_arsip == "Tidak Memuaskan" ? 'checked' : ''}} value="Tidak Memuaskan">
                            <p>Tidak Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-2" type="radio" id="arsp" name="arsp" {{$data->ruang_penyimpanan_arsip == "Baik" ? 'checked' : ''}} value="Baik">
                            <p>Baik</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-4" type="radio" id="arsp" name="arsp" {{$data->ruang_penyimpanan_arsip == "Memuaskan" ? 'checked' : ''}} value="Memuaskan">
                            <p>Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-5" type="radio" id="arsp" name="arsp" {{$data->ruang_penyimpanan_arsip == "Sangat Memuaskan" ? 'checked' : ''}} value="Sangat Memuaskan">
                            <p>Sangat Memuaskan</p>
                        </div>
                    </div>
                </div>
                <div class="mb-3 mb-sm-0 ml-2">
                    <p><b class="text-lg">Ruang Pertemuan</b>
                    <div class="row">
                        <div class="ml-3">
                            <input class="ml-6" type="radio" id="pertemuan" name="pertemuan" {{$data->ruang_pertemuan == "Sangat Tidak Memuaskan" ? 'checked' : ''}} value="Sangat Tidak Memuaskan">
                            <p>Sangat Tidak Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-5" type="radio" id="pertemuan" name="pertemuan" {{$data->ruang_pertemuan == "Tidak Memuaskan" ? 'checked' : ''}} value="Tidak Memuaskan">
                            <p>Tidak Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-2" type="radio" id="pertemuan" name="pertemuan" {{$data->ruang_pertemuan == "Baik" ? 'checked' : ''}} value="Baik">
                            <p>Baik</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-4" type="radio" id="pertemuan" name="pertemuan" {{$data->ruang_pertemuan == "Memuaskan" ? 'checked' : ''}} value="Memuaskan">
                            <p>Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-5" type="radio" id="pertemuan" name="pertemuan" {{$data->ruang_pertemuan == "Sangat Memuaskan" ? 'checked' : ''}} value="Sangat Memuaskan">
                            <p>Sangat Memuaskan</p>
                        </div>
                    </div>
                </div>
                <div class="mb-3 mb-sm-0 ml-2">
                    <p><b class="text-lg">Ruang Seminar</b>
                    <div class="row">
                        <div class="ml-3">
                            <input class="ml-6" type="radio" id="sem" name="sem" {{$data->ruang_seminar == "Sangat Tidak Memuaskan" ? 'checked' : '' }} value="Sangat Tidak Memuaskan">
                            <p>Sangat Tidak Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-5" type="radio" id="sem" name="sem" {{$data->ruang_seminar == "Tidak Memuaskan" ? 'checked' : '' }} value="Tidak Memuaskan">
                            <p>Tidak Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-2" type="radio" id="sem" name="sem" {{$data->ruang_seminar == "Baik" ? 'checked' : '' }} value="Baik">
                            <p>Baik</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-4" type="radio" id="sem" name="sem" {{$data->ruang_seminar == "Memuaskan" ? 'checked' : '' }} value="Memuaskan">
                            <p>Memuaskan</p>
                        </div>
                        <div class="ml-3">
                            <input class="ml-5" type="radio" id="sem" name="sem" {{$data->ruang_seminar == "Sangat Memuaskan" ? 'checked' : '' }} value="Sangat Memuaskan">
                            <p>Sangat Memuaskan</p>
                        </div>
                    </div>
                </div>
            <button class="ml-2" type="submit">Submit</button>
        </form>
    </div>
</div>
@stop