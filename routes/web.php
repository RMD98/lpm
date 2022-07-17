<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Fasilitas;
use App\Http\Controllers\Pkm;
use App\Http\Controllers\Standar;
use App\Http\Controllers\Unitbisnis;
use App\Http\Controllers\Kelembagaan;
use App\Http\Controllers\Manajemen;
use App\Http\Controllers\Luaran;
use App\Http\Controllers\Anggota;
use App\Http\Controllers\Mitra;
use App\Http\Controllers\Dosen;
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
//dashboard
Route::get('/',[Home::class,'index']);

//PKM
Route::get('/pkm',[Pkm::class,'index']);
Route::get('/add_pkm',[Pkm::class,'create']);
Route::post('/addpkm',[Pkm::class,'store']);
Route::get('/edit_pkm/{id}',[Pkm::class,'edit']);
Route::post('/editpkm/{id}',[Pkm::class,'update']);
Route::get('/del_pkm/{id}',[Pkm::class,'destroy']);
Route::get('/pkm/{id}',[Pkm::class,'show']);

//Standar PKM
Route::get('/standar',[Standar::class,'index']);
Route::get('/add_standar',[Standar::class,'create']);
Route::post('/addstandar',[Standar::class,'store']);
Route::get('/edit_standar/{id}',[Standar::class,'edit']);
Route::post('/edt_standar/{id}',[Standar::class,'update']);
Route::get('/del_standar/{id}',[Standar::class,'destroy']);

//Manajemen Pengabdian
Route::get('/manajemen',[Manajemen::class,'index']);
Route::get('/add_manajemen',[Manajemen::class,'create']);
Route::post('/addmanajemen',[Manajemen::class,'store']);
Route::get('/edit_manajemen/{id}',[Manajemen::class,'edit']);
Route::post('/edtmanajemen/{id}',[Manajemen::class,'update']);

//Kelembagaan Pengabdian
Route::get('/kelembagaan',[Kelembagaan::class,'index']);
Route::get('/add_kelembagaan',[Kelembagaan::class,'create']);
Route::post('/addkelembagaan',[Kelembagaan::class,'store']);
Route::get('/edit_kelembagaan/{id}',[Kelembagaan::class,'edit']);
Route::post('/edt_kelembagaan/{id}',[Kelembagaan::class,'update']);
Route::get('/del_kelembagaan/{id}',[Kelembagaan::class,'destroy']);

//Revenue Generating
Route::get('/unit_bisnis',[Unitbisnis::class,'index']);
Route::get('/add_ub',[Unitbisnis::class,'create']);
Route::post('/addub',[Unitbisnis::class,'store']);
Route::get('/edit_ub/{id}',[Unitbisnis::class,'edit']);
Route::post('/edtub/{id}',[Unitbisnis::class,'update']);
Route::get('/unit_bisnis/{id}',[Unitbisnis::class,'show']);
Route::get('/del_ub/{id}',[Unitbisnis::class,'destroy']);

//Dosen
Route::get('/dosen',[Dosen::class,'index']);
Route::get('/add_dosen',[Dosen::class,'create']);
Route::get('/adddosen',[Dosen::class,'store']);
Route::get('/edit_dosen/{id}',[Dosen::class,'edit']);
Route::get('/edtdosen/{id}',[Dosen::class,'update']);
Route::get('/del_dosen/{id}',[Dosen::class,'destroy']);

//Fasilitas
Route::get('/fasilitas',[Fasilitas::class,'index']);
Route::get('/add_fasilitas',[Fasilitas::class,'create']);
Route::post('/add_fasil',[Fasilitas::class,'store']);
Route::get('/edit_fasilitas/{id}',[Fasilitas::class,'edit']);
Route::post('/edt_fasil/{id}',[Fasilitas::class,'update']);
Route::get('/del_fasilitas/{id}',[Fasilitas::class,'destroy']);
Route::get('/fas_down/{id}',[Fasilitas::class,'download']);
Route::get('/fas_file/{id}',[Fasilitas::class,'file']);

//Anggota
Route::get('/del_pkm/{ids}/{id}',[Anggota::class,'destroy']);
Route::get('/pkm/mhs/{id}',[Anggota::class,'mhs']);
Route::get('/pkm/alm/{id}',[Anggota::class,'alm']);
Route::get('/pkm/staff/{id}',[Anggota::class,'staff']);
Route::get('/pkm/ketua/{id}',[Anggota::class,'ketua']);
Route::post('/editpkm/mhs/{id}',[Anggota::class,'upsirtmhs']);
Route::post('/editpkm/alm/{id}',[Anggota::class,'upsirtalm']);
Route::post('/editpkm/staff/{id}',[Anggota::class,'upsirtstaff']);
Route::post('/editpkm/ketua/{id}',[Anggota::class,'upsirtketua']);

//Luaran
Route::get('/del_pkm/{luaran}/{ids}/{id}',[Luaran::class,'destroy']);
Route::get('/del_pkm/jurnal/{ids}/{id}',[Luaran::class,'destroy']);
Route::get('/pkm/luaran/ipteklain/{id}',[Luaran::class,'iptek']);
Route::get('/pkm/luaran/haki/{id}',[Luaran::class,'haki']);
Route::get('/pkm/luaran/prodser/{id}',[Luaran::class,'prodser']);
Route::get('/pkm/luaran/prodstan/{id}',[Luaran::class,'prodstan']);
Route::get('/pkm/luaran/buku/{id}',[Luaran::class,'buku']);
Route::get('/pkm/luaran/mitrahukum/{id}',[Luaran::class,'mitrahukum']);
Route::get('/pkm/luaran/forum/{id}',[Luaran::class,'forum']);
Route::get('/pkm/luaran/media/{id}',[Luaran::class,'media']);
Route::get('/pkm/luaran/wbm/{id}',[Luaran::class,'wbm']);
Route::get('/pkm/luaran/jurnal/{id}',[Luaran::class,'jurnal']);
Route::post('/editpkm/luaran/iptek/{id}',[Luaran::class,'upsirtiptek']);
Route::post('/editpkm/luaran/haki/{id}',[Luaran::class,'upsirthaki']);
Route::post('/editpkm/luaran/buku/{id}',[Luaran::class,'upsirtbuku']);
Route::post('/editpkm/luaran/prodser/{id}',[Luaran::class,'upsirtprodser']);
Route::post('/editpkm/luaran/prodstan/{id}',[Luaran::class,'upsirtprodstan']);
Route::post('/editpkm/luaran/mitrahukum/{id}',[Luaran::class,'upsirtmitrahukum']);
Route::post('/editpkm/luaran/forum/{id}',[Luaran::class,'upsirtforum']);
Route::post('/editpkm/luaran/media/{id}',[Luaran::class,'upsirtmedia']);
Route::post('/editpkm/luaran/wbm/{id}',[Luaran::class,'upsirtwbm']);
Route::post('/editpkm/luaran/jurnal/{id}',[Luaran::class,'upsirtjurnal']);

//Mitra
Route::get('/pkm/mitra/{id}',[Mitra::class,'mitrapkm']);
Route::post('/editpkm/mitra/{id}',[Mitra::class,'upsirtmitrapkm']);
Route::get('/del_pkm/mitra/{ids}/{id}',[Mitra::class,'destroy']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
