@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Sumber Iptek</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/edtsumber/{{$data->id}}" method="post">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Sumber Iptek</b>
                        <input type="text" class="form-control" id="sumber" name="sumber" value="{{$data->sumber}}"
                        placeholder="Sumber Iptek">
                    </p>
                </div>
            </div>
            <button class="ml-2" type="submit">Submit</button>
        </form>
    </div>
</div>

@stop