<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Fasilitas;
use App\Http\Controllers\Pkm;
use App\Http\Controllers\Standar;
use App\Http\Controllers\Unitbisnis;
use App\Http\Controllers\Kelembagaan;
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
Route::get('/kelembagaan',[Kelembagaan::class,'index']);
Route::get('/unit_bisnis',[Unitbisnis::class,'index']);
Route::get('/standar',[Standar::class,'index']);
Route::get('/fasilitas',[Fasilitas::class,'index']);
Route::get('/add_fasilitas',[Fasilitas::class,'create']);
Route::get('/add_kelembagaan',[Kelembagaan::class,'create']);
Route::get('/add_pkm',[Pkm::class,'create']);
Route::get('/add_ub',[Unitbisnis::class,'create']);
Route::get('/add_standar',[Standar::class,'create']);
Route::post('/addpkm',[Pkm::class,'store']);
Route::post('/addub',[Unitbisnis::class,'store']);
Route::post('/addstandar',[Standar::class,'store']);
Route::post('/addkelembagaan',[Kelembagaan::class,'store']);
Route::post('/add_fasil',[Fasilitas::class,'store']);
Route::get('/edit_fasilitas/{id}',[Fasilitas::class,'edit']);
Route::get('/edit_pkm/{id}',[Pkm::class,'edit']);
Route::get('/edit_standar/{id}',[Standar::class,'edit']);
Route::get('/edit_standar/{id}',[Standar::class,'edit']);
Route::get('/edit_ub/{id}',[Unitbisnis::class,'edit']);
Route::get('/del_fasilitas/{id}',[Fasilitas::class,'destroy']);
Route::get('/del_pkm/{id}',[Pkm::class,'destroy']);
Route::get('/del_kelembagaan/{id}',[Kelembagaan::class,'destroy']);
Route::get('/del_standar/{id}',[Standar::class,'destroy']);
Route::get('/del_ub/{id}',[Unitbisnis::class,'destroy']);
Route::post('/editpkm/{id}',[Pkm::class,'update']);
Route::post('/edt_fasil/{id}',[Fasilitas::class,'update']);
Route::post('/edt_standar/{id}',[Standar::class,'update']);
Route::get('/fas_down/{id}',[Fasilitas::class,'download']);
Route::get('/ub_file/{id}',[Unitbisnis::class,'show']);
Route::get('/fas_file/{id}',[Fasilitas::class,'show']);
Route::get('/login', function () {
    return view('auth/login');
});
Route::get('/register', function () {
    return view('auth/register');
});
Route::get('/forgot-password', function () {
    return view('auth/forgot-password');
});
