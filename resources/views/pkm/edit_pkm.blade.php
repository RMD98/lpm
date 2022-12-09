@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Kegiatan PKM</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/editpkm/<?php echo $data->id ?>" method="post">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Judul</b>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $data->judul ?>"
                        placeholder="Judul">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Sesuai Dengan Roadmap?</b>
                        &nbsp
                        <label for="roadmap">
                            <input type="radio" id="roadmap" name="roadmap" value="Ya" {{ $data->roadmap == 'Ya' ? 'checked':''}}> Ya
                            <input type="radio" id="roadmap1" name="roadmap" value="Tidak" {{ $data->roadmap == 'Tidak' ? 'checked':''}}> Tidak
                        </label>
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Bidang</b>
                        <input type="text" class="form-control" id="bidang" name="bidang" value="<?php echo $data->bidang?>"
                        placeholder="Bidang">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Jenis Kegiatan</b>
                        &nbsp
                        <select name="jenis" id="jenis">
                            <option value="Insidental" {{$data->jeniskegiatan =='Insidental' ? 'selected' :''}}>Insidental < 1 bln</option>
                            <option value="Non-Insidental" {{$data->jeniskegiatan =='Non-Insidental' ? 'selected' :''}}>Non-Insidental 1 - 6 bln</option>
                        </select>
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Tingkat Penyelenggaraan Kegiatan</b>
                        &nbsp
                        <select name="skala" id="skala">
                            <option value="Local" {{$data->skala =='Local' ? 'selected' :''}}>Local</option>
                            <option value="Nasional" {{$data->skala =='Nasional' ? 'selected' :''}}>Nasional</option>
                        </select>
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Jumlah Dana</b>
                    <input type="number" class="form-control" id="dana" name="dana" value="<?php echo $data->dana ?>"
                    placeholder="Jumlah Dana">
                </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Sumber Dana</b>
                    &nbsp
                    <select name="sumber" id="sumber">
                        <option value="Mandiri"{{$data->sumberdana =='Mandiri' ? 'selected' :''}}>Mandiri</option>
                        <option value="Internal PT"{{$data->sumberdana =='Internal PT' ? 'selected' :''}}>Internal PT</option>
                        <option value="Dikti" {{$data->sumberdana =='Dikti' ? 'selected' :''}}>Dikti</option>
                        <option value="Lembaga Nasional Selain Dikti"{{$data->sumberdana =='Lembaga Nasional Selain Dikti' ? 'selected' :''}}>Lembaga Nasional Selain Dikti</option>
                        <option value="Lembaga Luar Negri"{{$data->sumberdana =='Lembaga Luar Negri' ? 'selected' :''}}>Lembaga Luar Negri</option>
                    </select>
                </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Tahun Kegiatan</b>
                        <input type="number" class="form-control" id="t-awal" name="tawal" placeholder="Tahun Awal" value="<?php echo $data->tahun_mulai?>">
                        &nbsp
                        <input type="number" class="form-control" id="t-akhir" name="takhir" placeholder="Tahun Akhir" value="<?php echo $data->tahun_akhir?>">
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
                        <input type="number" class="form-control" id="dpend" name="dpend" placeholder="Dana Pendamping" value="<?php echo $data->danapendamping ?>">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Laboratorium</b>
                        <input type="text" class="form-control" id="lab" name="lab" placeholder="Laboratorium" value="<?php echo $data->lab ?>">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Kelengkapan</b>
                        &nbsp
                        <label for="kelengkapan">
                            <input type="radio" id="kelengkapan" name="kelengkapan" value="Ya"{{$data->kelengkapan =='Ya' ? 'checked' :''}}> Ya
                            <input type="radio" id="kelengkapan" name="kelengkapan" value="Tidak"{{$data->kelengkapan =='Tidak' ? 'checked' :''}}> Tidak
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
                var x = document.getElementById("roadmap");
                var y = document.getElementById("roadmap1");
                if($data->roadmap == 'Ya'){
                    x.on = true
                }
                else{
                    y.on = true
                }
            }
    </script>
@stop