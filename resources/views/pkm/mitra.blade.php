@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Mitra PKM Yang Terlibat</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/editpkm/mitra/{{$id}}" method="post">
            @csrf
            <div class="form-group row" id="isian">
                @foreach($data as $key=>$value)
                <div class="col-sm-6 mb-3 mb-sm-0 mt-2 ml-4 card shadows">
                    <input type="text" hidden class="form-control" id="ids[{{$key}}]" name="ids[{{$key}}]" value="{{$data[$key]->id}}">
                    <p><b>Nama</b>
                        <input type="text" class="form-control" id="nama[{{$key}}]" name="nama[{{$key}}]" value="{{$data[$key]->nama}}"
                        placeholder="Nama">
                    </p>
                    <p><b>Jenis MItra</b>
                        <select name="jenis[{{$key}}]" id="jenis[{{$key}}]" class="form-control">
                            <option value="Masyarakat yang belum produktif secara ekonomis, tetapi berhasrat kuat menjadi wirausahawan" {{$data[$key]->jenis =='Masyarakat yang belum produktif secara ekonomis, tetapi berhasrat kuat menjadi wirausahawan' ? 'selected' :''}}>Masyarakat yang belum produktif secara ekonomis, tetapi berhasrat kuat menjadi wirausahawan</option>
                            <option value="Masyarakat yang produktif secara ekonomi" {{$data[$key]->jenis =='Masyarakat yang produktif secara ekonomi' ? 'selected' :''}}>Masyarakat yang produktif secara ekonomi</option>
                            <option value="Masyarakat yang tidak produktif secara ekonomi (masyarakat umum/biasa)" {{$data[$key]->jenis =='Masyarakat yang tidak produktif secara ekonomi (masyarakat umum/biasa)' ? 'selected' :''}}>Masyarakat yang tidak produktif secara ekonomi (masyarakat umum/biasa)</option>
                        </select>
                        
                    </p>
                    <p><b>Alamat</b>
                        <input type="text" class="form-control" id="alamat[{{$key}}]" name="alamat[{{$key}}]" value="{{$data[$key]->alamat}}"
                        placeholder="Alamat">
                    </p>
                    <p><b>Jarak dari Itenas</b>
                        <input type="text" class="form-control" id="jarak[{{$key}}]" name="jarak[{{$key}}]" value="{{$data[$key]->jarak}}"
                        placeholder="Jarak dari Itenas">
                    </p>
                    <p><b>Manfaat Yang Didapatkan Mitra</b>
                        <input type="text" class="form-control" id="manfaat[{{$key}}]" name="manfaat[{{$key}}]" value="{{$data[$key]->manfaat}}"
                        placeholder="Manfaat Yang Didapatkan Mitra">
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
                    <p><b>Jenis MItra</b>
                        <select name="jenisbru[`+i+`]" id="jenisbru[`+i+`]" class="form-control">
                            <option value="Masyarakat yang produktif secara ekonomi">Masyarakat yang produktif secara ekonomi</option>
                            <option value="Masyarakat yang belum produktif secara ekonomis, tetapi berhasrat kuat menjadi wirausahawan">Masyarakat yang belum produktif secara ekonomis, tetapi berhasrat kuat menjadi wirausahawan</option>
                            <option value="Masyarakat yang tidak produktif secara ekonomi (masyarakat umum/biasa)">Masyarakat yang tidak produktif secara ekonomi (masyarakat umum/biasa)</option>
                        </select>
                    </p>
                    <p><b>Alamat</b>
                        <input type="text" class="form-control" id="alamatbru[`+i+`]" name="alamatbru[`+i+`]"
                        placeholder="Alamat">
                    </p>
                    <p><b>Jarak dari Itenas</b>
                        <input type="text" class="form-control" id="jarakbru[`+i+`]" name="jarakbru[`+i+`]"
                        placeholder="Jarak dari Itenas">
                    </p>
                    <p><b>Manfaat Yang Didapatkan Mitra</b>
                        <input type="text" class="form-control" id="manfaatbru[`+i+`]" name="manfaatbru[`+i+`]"
                        placeholder="Manfaat Yang Didapatkan Mitra">
                    </p>
                </div>`)
            }
    </script>
@stop