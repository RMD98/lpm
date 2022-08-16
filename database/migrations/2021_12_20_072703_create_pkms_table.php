<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePkmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pkms', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('roadmap');
            $table->string('bidang');
            $table->string('jenis');
            $table->string('skala');
            $table->integer('dana');
            $table->string('sumberdana');
            $table->string('tahun_mulai');
            $table->string('tahun_akhir');
            $table->string('sumberiptek');
            $table->integer('danapendamping');
            $table->string('lab');
            $table->string('kelengkapan');
            $table->timestamps()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pkms');
    }
}
