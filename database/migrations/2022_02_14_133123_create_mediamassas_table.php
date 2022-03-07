<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediamassasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mediamassas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('url');
            $table->string('nama_media');
            $table->string('jenis');
            $table->string('volume');
            $table->string('nomor');
            $table->string('hal');
            $table->date('tgl_terbit');
            $table->string('skala');
            $table->string('nidn');
            $table->string('bukti');
            $table->timestamps();
        });

        Schema::table('mediamassas', function (Blueprint $table) {
            $table->foreign('nidn')->references('nidn')->on('dosens');
        
        });
        Schema::table('luarans', function (Blueprint $table) {
            $table->foreignId('media_massa')->nullable()->constrained('mediamassas')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mediamassas');
    }
}
