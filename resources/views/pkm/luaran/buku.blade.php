@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Luaran Buku</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/editpkm/luaran/buku/{{$id}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row" id="isian">
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2 mt-2 card shadows">
                    <input type="text" hidden class="form-control" id="ids" name="ids" value="{{count($data) == 0 ? '' : $data[0]->id}}">
                    <p><b>Judul Buku</b>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{count($data) == 0 ? '' : $data[0]->judul}}"
                        placeholder="Judul Buku">
                    </p>
                    <p><b>Nama Penulis</b>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{count($data) == 0 ? '' : $data[0]->nama}}"
                        placeholder="Nama Penulis">
                    </p>
                    <p><b>NIDN Penulis</b>
                        <input type="text" class="form-control" id="nidn" name="nidn" value="{{count($data) == 0 ? '' : $data[0]->nidn}}"
                        placeholder="NIDN Penulis">
                    </p>
                    <p><b>Jenis Luaran Iptek Lain</b>
                        @if(count($data) == 0 )
                           {{ $jenis = ''}}
                        @else
                           {{ $jenis = $data[0]->jenis }}
                        @endif
                        <select name="jenis" id="jenis">
                            <option value="Bahan Ajar" {{$jenis == 'Bahan Ajar' ? 'selected' :''}}>
                                Bahan Ajar
                            </option>
                        </select>
                    </p>
                    <p><b>Penerbit</b>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{count($data) == 0 ? '': $data[0]->penerbit}}"
                        placeholder="Penerbit">
                    <p><b>ISBN</b>
                        <input type="text" class="form-control" id="isbn" name="isbn" value="{{count($data) == 0 ? '': $data[0]->isbn}}"
                        placeholder="ISBN">
                    </p>
                    <p><b>Jumlah Halaman</b>
                        <input type="number" class="form-control" id="jum_halaman" name="jum_halaman" value="{{count($data) == 0 ? '': $data[0]->jum_halaman}}"
                        placeholder="Jumlah Halaman">
                    </p>
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
@stop