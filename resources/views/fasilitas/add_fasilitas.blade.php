@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Fasilitas Pendukung</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/add_fasil" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nama labolatorium</b>
                        <input type="text" require class="form-control" id="NamaLab" name="NamaLab"
                        placeholder="Nama Lab">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Lingkup</b>
                        <Select require class="form-control" id="lingkup" name="Lingkup">
                            <?php foreach ($data as $data) :?>
                                <option value="<?php echo $data->nama?>"><?php echo $data->nama?> </option>
                            <?php endforeach ?>
                        </Select>
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Surat Keterangan</b>
                        <input type="file" id="filesk" accept=".pdf" name="filesk">
                    </p>
                </div>
            </div>
            <button class="ml-2" type="submit">Submit</button>
        </form>
    </div>
</div>
@stop