@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Fakultas</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/addfakultas" method="post">
            @csrf
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nama Fakultas</b>
                        <input type="text" class="form-control" id="nama" name="nama"
                        placeholder="Nama Fakultas">
                    </p>
                </div>
            </div>
            <button class="ml-2" type="submit">Submit</button>
        </form>
    </div>
</div>
@stop