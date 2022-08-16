<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManajemensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manajemens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sop');
            $table->enum('konsistensi',['Konsisten','Tidak Konsisten','Tidak Ada']);
            $table->string('file')->nullable();
            $table->year('tahun');
            $table->integer('key');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manajemens');
    }
}
