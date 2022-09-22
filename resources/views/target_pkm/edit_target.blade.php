@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Target PKM</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/edttarget/{{$data->id}}" method="post">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Tahun</b>
                        <input type="year" class="form-control" id="tahun" name="tahun" value="{{$data->tahun}}"
                        placeholder="Tahun">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Prodi</b>
                        <select name="prodi" id="fakultas" class="form-control">
                            @foreach($prodi as $key=>$value)
                                <option value="{{$value->id}}" {{$data->prodi==$value->id ? 'selected' : ''}}>{{$value->nama}}</option>
                            @endforeach
                        </select>
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Target</b>
                        <input type="number" class="form-control" id="target" name="target" value="{{$data->target}}"
                        placeholder="Target">
                    </p>
                </div>
            </div>
            <button class="ml-2" type="submit">Submit</button>
        </form>
    </div>
</div>
@stop