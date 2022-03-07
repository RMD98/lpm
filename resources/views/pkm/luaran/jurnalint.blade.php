@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Luaran Jurnal Internasional</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/editpkm/luaran/jurnal/{{$id}}" method="post">
            @csrf
            <div class="form-group row" id="isian">
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2 mt-2 card shadows">
                    <input type="text" hidden class="form-control" id="ids" name="ids" value="{{count($data) == 0 ? '' : $data[0]->id}}">
                    <p><b>Judul Makalah</b>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{count($data) == 0 ? '' : $data[0]->judul}}"
                        placeholder="Judul Makalah">
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
                    <p><b>Nama Jurnal</b>
                        <input type="text" class="form-control" id="nama_jurnal" name="nama_jurnal" value="{{count($data) == 0 ? '' : $data[0]->nama_jurnal}}"
                        placeholder="Nama Jurnal">
                    </p>
                    <p><b>Jenis Jurnal</b>
                        @if(count($data) == 0 )
                           {{ $jenis = ''}}
                        @else
                           {{ $jenis = $data[0]->jenis }}
                        @endif
                        <select name="jenis" id="jenis" >
                            <option  id='mjl' value="Jurnal internasional terindeks scopus" {{$jenis == 'Jurnal internasional terindeks scopus' ? 'selected' :''}}>
                                Jurnal internasional terindeks scopus
                            </option>
                            <option  id='mjl' value="Jurnal internasional tidak terindeks scopus" {{$jenis == 'Jurnal internasional tidak terindeks scopus' ? 'selected' :''}}>
                                Jurnal internasional tidak terindeks scopus
                            </option>
                            <option  id='mjl' value="Jurnal nasional terakreditasi" {{$jenis == 'Jurnal nasional terakreditasi' ? 'selected' :''}}>
                                Jurnal nasional terakreditasi
                            </option>
                            <option  id='mjl' value="Jurnal nasional tidak terakreditasi (memiliki ISSN)" {{$jenis == 'Jurnal nasional tidak terakreditasi (memiliki ISSN)' ? 'selected' :''}}>
                                Jurnal nasional tidak terakreditasi (memiliki ISSN)
                            </option>
                        </select>
                    </p>
                    <p><b>P-ISSN</b>
                        <input type="text" class="form-control" id="p_issn" name="p_issn" value="{{count($data) == 0 ? '': $data[0]->p_issn}}"
                        placeholder="P-ISSN">
                    <p><b>E-ISSN</b>
                        <input type="text" class="form-control" id="e_issn" name="e_issn" value="{{count($data) == 0 ? '': $data[0]->e_issn}}"
                        placeholder="E-ISSN">
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