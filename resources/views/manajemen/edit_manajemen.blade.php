@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Manajemen Pengabdian</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/edtmanajemen/{{$tahun}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Tahun</b>
                    <input type="number" unique class="form-control" id="tahun" name="tahun" value="{{$tahun}}"
                    placeholder="Tahun">
                    </p>
                    @if($errors->any())
                        <h6 class="text-danger">{{$errors->first()}}</h6>
                    @endif
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <h4 class="mb-2 text-gray-800"><b>SOP Kegiatan Pelatihan Dan Atau Klinik Proposal</b></h4>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Konsistensi</b>
                        <input type="text" hidden name="id[0]" value={{$data[0]->id}}>
                        <select name="konsistensi[0]" id="konsistensi">
                            <option value="Konsisten" {{$data[0]->konsistensi=="Konsisten" ? 'selected' : ''}}>Konsisten</option>
                            <option value="Tidak Konsisten" {{$data[0]->konsistensi=="Tidak Konsisten" ? 'selected' :''}}>Tidak Konsisten</option>
                            <option value="Tidak Ada" {{$data[0]->konsistensi=="Tidak Ada" ? 'selected' :''}}>Tidak Ada</option>
                        </select>
                        &nbsp
                        <b>Dokumen</b>
                        <input type="file" id="filesk" accept=".pdf" name="file[0]">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <h4 class="mb-2 text-gray-800"><b>SOP Rekrutmen Reviewer Internal </b></h4>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Konsistensi</b>
                        <input type="text" hidden name="id[1]" value={{$data[1]->id}}>
                        <select name="konsistensi[1]" id="konsistensi">
                            <option value="Konsisten" {{$data[1]->konsistensi=="Konsisten" ? 'selected' :''}}>Konsisten</option>
                            <option value="Tidak Konsisten" {{$data[1]->konsistensi=="Tidak Konsisten" ? 'selected' :''}}>Tidak Konsisten</option>
                            <option value="Tidak Ada" {{$data[1]->konsistensi=="Tidak Ada" ? 'selected' :''}}>Tidak Ada</option>
                        </select>
                        &nbsp
                        <b>Dokumen</b>
                        <input type="file" id="filesk" accept=".pdf" name="file[1]">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <h4 class="mb-2 text-gray-800"><b>SOP Evaluasi Proposal</b></h4>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Konsistensi</b>
                        <input type="text" hidden name="id[2]" value={{$data[2]->id}}>
                        <select name="konsistensi[2]" id="konsistensi">
                        <option value="Konsisten" {{$data[2]->konsistensi=="Konsisten" ? 'selected' :''}}>Konsisten</option>
                            <option value="Tidak Konsisten" {{$data[2]->konsistensi=="Tidak Konsisten" ? 'selected' :''}}>Tidak Konsisten</option>
                            <option value="Tidak Ada" {{$data[2]->konsistensi=="Tidak Ada" ? 'selected' :''}}>Tidak Ada</option>
                        </select>
                        &nbsp
                        <b>Dokumen</b>
                        <input type="file" id="filesk" accept=".pdf" name="file[2]">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <h4 class="mb-2 text-gray-800"><b>SOP Seminar Pembahasan Proposal</b></h4>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Konsistensi</b>
                        <input type="text" hidden name="id[3]" value={{$data[3]->id}}>
                        <select name="konsistensi[3]" id="konsistensi">
                        <option value="Konsisten" {{$data[3]->konsistensi=="Konsisten" ? 'selected' :''}}>Konsisten</option>
                            <option value="Tidak Konsisten" {{$data[3]->konsistensi=="Tidak Konsisten" ? 'selected' :''}}>Tidak Konsisten</option>
                            <option value="Tidak Ada" {{$data[3]->konsistensi=="Tidak Ada" ? 'selected' :''}}>Tidak Ada</option>
                        </select>
                        &nbsp
                        <b>Dokumen</b>
                        <input type="file" id="filesk" accept=".pdf" name="file[3]">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <h4 class="mb-2 text-gray-800"><b>SOP Penetapan Pemenang</b></h4>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Konsistensi</b>
                        <input type="text" hidden name="id[4]" value={{$data[4]->id}}>
                        <select name="konsistensi[4]" id="konsistensi">
                            <option value="Konsisten" {{$data[4]->konsistensi=="Konsisten" ? 'selected' :''}}>Konsisten</option>
                            <option value="Tidak Konsisten" {{$data[4]->konsistensi=="Tidak Konsisten" ? 'selected' :''}}>Tidak Konsisten</option>
                            <option value="Tidak Ada" {{$data[4]->konsistensi=="Tidak Ada" ? 'selected' :''}}>Tidak Ada</option>
                        </select>
                        &nbsp
                        <b>Dokumen</b>
                        <input type="file" id="filesk" accept=".pdf" name="file[4]">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <h4 class="mb-2 text-gray-800"><b>SOP Kontrak Pelaksanaan PKM </b></h4>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Konsistensi</b>
                        <input type="text" hidden name="id[5]" value={{$data[5]->id}}>
                        <select name="konsistensi[5]" id="konsistensi">
                            <option value="Konsisten" {{$data[5]->konsistensi=="Konsisten" ? 'selected' :''}}>Konsisten</option>
                            <option value="Tidak Konsisten" {{$data[5]->konsistensi=="Tidak Konsisten" ? 'selected' :''}}>Tidak Konsisten</option>
                            <option value="Tidak Ada" {{$data[5]->konsistensi=="Tidak Ada" ? 'selected' :''}}>Tidak Ada</option>
                        </select>
                        &nbsp
                        <b>Dokumen</b>
                        <input type="file" id="filesk" accept=".pdf" name="file[5]">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <h4 class="mb-2 text-gray-800"><b>SOP Monitoring Dan Evaluasi Internal</b></h4>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Konsistensi</b>
                        <input type="text" hidden name="id[6]" value={{$data[6]->id}}>
                        <select name="konsistensi[6]" id="konsistensi">
                            <option value="Konsisten" {{$data[6]->konsistensi=="Konsisten" ? 'selected' :''}}>Konsisten</option>
                            <option value="Tidak Konsisten" {{$data[6]->konsistensi=="Tidak Konsisten" ? 'selected' :''}}>Tidak Konsisten</option>
                            <option value="Tidak Ada" {{$data[6]->konsistensi=="Tidak Ada" ? 'selected' :''}}>Tidak Ada</option>
                        </select>
                        &nbsp
                        <b>Dokumen</b>
                        <input type="file" id="filesk" accept=".pdf" name="file[6]">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <h4 class="mb-2 text-gray-800"><b>SOP Sistem Penghargaan (Reward Dan Punishment) </b></h4>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Konsistensi</b>
                        <input type="text" hidden name="id[7]" value={{$data[7]->id}}>
                        <select name="konsistensi[7]" id="konsistensi">
                            <option value="Konsisten" {{$data[7]->konsistensi=="Konsisten" ? 'selected' :''}}>Konsisten</option>
                            <option value="Tidak Konsisten" {{$data[7]->konsistensi=="Tidak Konsisten" ? 'selected' :''}}>Tidak Konsisten</option>
                            <option value="Tidak Ada" {{$data[7]->konsistensi=="Tidak Ada" ? 'selected' :''}}>Tidak Ada</option>
                        </select>
                        &nbsp
                        <b>Dokumen</b>
                        <input type="file" id="filesk" accept=".pdf" name="file[7]">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <h4 class="mb-2 text-gray-800"><b>SOP Pelaporan Hasil PKM</b></h4>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Konsistensi</b>
                        <input type="text" hidden name="id[8]" value={{$data[8]->id}}>
                        <select name="konsistensi[8]" id="konsistensi">
                            <option value="Konsisten" {{$data[8]->konsistensi=="Konsisten" ? 'selected' :''}}>Konsisten</option>
                            <option value="Tidak Konsisten" {{$data[8]->konsistensi=="Tidak Konsisten" ? 'selected' :''}}>Tidak Konsisten</option>
                            <option value="Tidak Ada" {{$data[8]->konsistensi=="Tidak Ada" ? 'selected' :''}}>Tidak Ada</option>
                        </select>
                        &nbsp
                        <b>Dokumen</b>
                        <input type="file" id="filesk" accept=".pdf" name="file[8]">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <h4 class="mb-2 text-gray-800"><b>SOP Kegiatan Seminar/Pameran Hasil PKM</b></h4>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Konsistensi</b>
                        <input type="text" hidden name="id[9]" value={{$data[9]->id}}>
                        <select name="konsistensi[9]" id="konsistensi">
                            <option value="Konsisten" {{$data[9]->konsistensi=="Konsisten" ? 'selected' :''}}>Konsisten</option>
                            <option value="Tidak Konsisten" {{$data[9]->konsistensi=="Tidak Konsisten" ? 'selected' :''}}>Tidak Konsisten</option>
                            <option value="Tidak Ada" {{$data[9]->konsistensi=="Tidak Ada" ? 'selected' :''}}>Tidak Ada</option>
                        </select>
                        &nbsp
                        <b>Dokumen</b>
                        <input type="file" id="filesk" accept=".pdf" name="file[9]">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <h4 class="mb-2 text-gray-800"><b>SOP Proses Penjaminan Mutu</b></h4>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Konsistensi</b>
                        <input type="text" hidden name="id[10]" value={{$data[10]->id}}>
                        <select name="konsistensi[10]" id="konsistensi">
                            <option value="Konsisten" {{$data[10]->konsistensi=="Konsisten" ? 'selected' :''}}>Konsisten</option>
                            <option value="Tidak Konsisten" {{$data[10]->konsistensi=="Tidak Konsisten" ? 'selected' :''}}>Tidak Konsisten</option>
                            <option value="Tidak Ada" {{$data[10]->konsistensi=="Tidak Ada" ? 'selected' :''}}>Tidak Ada</option>
                        </select>
                        &nbsp
                        <b>Dokumen</b>
                        <input type="file" id="filesk" accept=".pdf" name="file[10]">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <h4 class="mb-2 text-gray-800"><b>SOP Tindak Lanjut Hasil PKM </b></h4>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Konsistensi</b>
                        <input type="text" hidden name="id[11]" value={{$data[11]->id}}>
                        <select name="konsistensi[11]" id="konsistensi">
                            <option value="Konsisten" {{$data[11]->konsistensi=="Konsisten" ? 'selected' :''}}>Konsisten</option>
                            <option value="Tidak Konsisten" {{$data[11]->konsistensi=="Tidak Konsisten" ? 'selected' :''}}>Tidak Konsisten</option>
                            <option value="Tidak Ada" {{$data[11]->konsistensi=="Tidak Ada" ? 'selected' :''}}>Tidak Ada</option>
                        </select>
                        &nbsp
                        <b>Dokumen</b>
                        <input type="file" id="filesk" accept=".pdf" name="file[11]">
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