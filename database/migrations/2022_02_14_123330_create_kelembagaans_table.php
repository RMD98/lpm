<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelembagaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelembagaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_sk');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('no_fax');
            $table->string('email');
            $table->string('url');
            $table->string('no_sk_resentra');
            $table->string('sk_pendirian');
            $table->string('resentra');
            $table->string('nama_ketua');
            $table->string('nidn');
            $table->string('ruang_pimpinan');
            $table->string('ruang_administrasi');
            $table->string('ruang_penyimpanan_arsip');
            $table->string('ruang_pertemuan');
            $table->string('ruang_seminar');
            $table->year('tahun');
            $table->timestamps();
        });

        Schema::table('kelembagaans', function (Blueprint $table) {
            $table->foreign('nidn')->references('nidn')->on('dosens');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelembagaans');
    }
}
