@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Luaran Media Massa</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/editpkm/luaran/media/{{$id}}" method="post">
            @csrf
            <div class="form-group row" id="isian">
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2 mt-2 card shadows">
                    <input type="text" hidden class="form-control" id="ids" name="ids" value="{{count($data) == 0 ? '' : $data[0]->id}}">
                    <p><b>Judul</b>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{count($data) == 0 ? '' : $data[0]->judul}}"
                        placeholder="Judul">
                    </p>
                    <p><b>Nama Penulis</b>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{count($data) == 0 ? '' : $data[0]->nama}}"
                        placeholder="Nama Penulis">
                    </p>
                    <p><b>NIDN Penulis</b>
                        <input type="text" class="form-control" id="nidn" name="nidn" value="{{count($data) == 0 ? '' : $data[0]->nidn}}"
                        placeholder="NIDN Penulis">
                    </p>
                    <p><b>Url</b>
                        <input type="url" class="form-control" id="url" name="url" value="{{count($data) == 0 ? '' : $data[0]->url}}"
                        placeholder="Url">
                    </p>
                    <p><b>Jenis Media Massa</b>
                        @if(count($data) == 0 )
                           {{ $jenis = ''}}
                        @else
                           {{ $jenis = $data[0]->jenis }}
                        @endif
                        <select name="jenis" id="jenis" onChange="piljenis()">
                            <option default value=""></option>
                            <option  id='mjl' value="Majalah" {{$jenis == 'Majalah' ? 'selected' :''}}>
                                Majalah
                            </option>
                            <option id='krn' value="Koran" {{$jenis == 'Koran' ? 'selected' :''}}>
                                Koran
                            </option>
                        </select>
                    </p>
                    <p><b>Nama Media Massa</b>
                        <input type="text" class="form-control" id="nama_media" name="nama_media" value="{{count($data) == 0 ? '': $data[0]->nama_media}}"
                        placeholder="Nama Media Massa">
                    <div id="majalah" {{$jenis == 'Majalah' ? '' :'hidden'}}>
                        <p><b>Volume</b>
                            <input type="text" class="form-control" id="volume" name="volume" value="{{count($data) == 0 ? '' : $data[0]->volume}}"
                            placeholder="Volume">
                        </p>
                        <p><b>Nomor</b>
                            <input type="text" class="form-control" id="nomor" name="nomor" value="{{count($data) == 0 ? '' : $data[0]->nomor}}"
                            placeholder="Nomor">
                        </p>
                        <p><b>Halaman ke-</b>
                            <input type="number" class="form-control" id="hal" name="hal" value="{{count($data) == 0 ? '' : $data[0]->hal}}"
                            placeholder="Halaman ke-">
                        </p>
                    </div>
                    <div id="koran" {{$jenis == 'Koran' ? '' : 'hidden'}}>
                        <p><b>Tanggal tebit</b>
                            <input type="date" class="form-control" id="tgl_terbit" name="tgl_terbit" value="{{count($data) == 0 ? '' : $data[0]->tgl_terbit}}"
                            placeholder="Tanggal tebit">
                        </p>
                        <p><b>Skala</b>
                        @if(count($data) == 0 )
                           {{ $skala = ''}}
                        @else
                           {{ $skala = $data[0]->skala }}
                        @endif
                            <select class="form-control" id="skala" name="skala" value="{{count($data) == 0 ? '' : $data[0]->skala}}"
                            placeholder="Skala">
                            <option value="Lokal"{{$skala== 'Lokal' ? 'selected' : ''}}>Lokal</option>
                            <option value="Nasional"{{$skala== 'Nasional' ? 'selected' : ''}}>Nasional</option>
                            </select>
                        </p>
                        <p><b>Halaman ke-</b>
                            <input type="number" class="form-control" id="hals" name="hals" value="{{count($data) == 0 ? '' : $data[0]->hal}}"
                            placeholder="Halaman ke-">
                        </p>
                    </div>
                    <p><b>Bukti</b>
                        @if(count($data) != 0)
                            @if($data[0]->bukti !=NULL)
                                <a href="/fas_down/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    <i class="fas fa-download fa-sm text-white-50"></i>
                                Download</a>
                                <a href="/fas_file/" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    <i class="fas fa-eye fa-sm text-white-50"></i>
                                Show</a>
                                <input type="file" name="" id="">
                            @else
                                <input type="file" class="form-control" id="bukti" name="bukti" 
                                placeholder="Deskripsi">
                            @endif
                        @else
                            <input type="file" class="form-control" id="bukti" name="bukti">
                        @endif
                    </p>
                </div>
            </div>
            <button class="ml-2" type="submit">Submit</button>
        </form>
    </div>
</div>
<script>

    function piljenis(){
        var x = document.getElementById('mjl').selected;
        var y = document.getElementById('krn').selected;
        if(x==true){
            document.getElementById('majalah').hidden=false;
            document.getElementById('koran').hidden=true;
        }else if(y==true){
            document.getElementById('majalah').hidden=true;
            document.getElementById('koran').hidden=false;
        }
    }
</script>
@stop