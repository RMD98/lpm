@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit User</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form action="/edtuser/{{$data->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="form-group row" id="isian">
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nama</b>
                        <input type="text" require class="form-control" id="nama" name="nama" value="{{$data->name}}"
                        placeholder="Nama">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Email</b>
                        <input type="text" require class="form-control" id="email" name="email" value="{{$data->email}}"
                        placeholder="Email">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Role</b>
                        <select name="role" id="role" class="form-control">
                            <option {{$data->role == 'super admin' ? 'selected' : ''}} value="super admin" >Super Admin</option>
                            <option {{$data->role == 'admin' ? 'selected' : ''}} value="admin">Admin</option>
                        </select>
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p>
                        <b>Password</b>
                        <input id="password" class="form-control" type="password" name="password" autocomplete="new-password" />
                    </p>
                </div>
                <!-- Confirm Password -->
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p>
                        <b>Confirm Password</b>
                        <input id="password_confirmation" class="form-control" type="password" name="confirm" />
                    </p>
                </div>
            </div>
            <button class="ml-2" type="submit">Submit</button>
        </form>
    </div>
</div>
@stop