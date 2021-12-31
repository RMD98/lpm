<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Fasilitas;
use App\Http\Controllers\Pkm;
use App\Http\Controllers\Standar;
use App\Http\Controllers\Unitbisnis;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[Controller::class,'index']);
Route::get('/pkm',[Pkm::class,'index']);
Route::get('/unit_bisnis',[Unitbisnis::class,'index']);
Route::get('/standar',[Standar::class,'index']);
Route::get('/add_fasilitas',[Fasilitas::class,'create']);
Route::get('/add_pkm',[Pkm::class,'create']);
Route::post('/addpkm',[Pkm::class,'store']);
Route::get('/add_standar',[Standar::class,'create']);
Route::post('/addstandar',[Standar::class,'store']);
Route::post('/editpkm/{id}',[Pkm::class,'update']);
Route::get('/edit_fasilitas/{id}',[Fasilitas::class,'edit']);
Route::get('/edit_pkm/{id}',[Pkm::class,'edit']);
Route::get('/edit_standar/{id}',[Standar::class,'edit']);
Route::get('/fasilitas',[Fasilitas::class,'index']);
Route::get('/del_fasilitas/{id}',[Fasilitas::class,'destroy']);
Route::get('/del_pkm/{id}',[Pkm::class,'destroy']);
Route::get('/del_standar/{id}',[Standar::class,'destroy']);
Route::post('/add_fasil',[Fasilitas::class,'store']);
Route::post('/edt_fasil/{id}',[Fasilitas::class,'update']);
Route::post('/edt_standar/{id}',[Standar::class,'update']);
Route::get('/login', function () {
    return view('auth/login');
});
Route::get('/register', function () {
    return view('auth/register');
});
Route::get('/forgot-password', function () {
    return view('auth/forgot-password');
});
