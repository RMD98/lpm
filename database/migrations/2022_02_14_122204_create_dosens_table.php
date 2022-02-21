<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->string('nidn');
            $table->primary('nidn');
            $table->string('nama');
            $table->string('prodi');
            $table->string('pendidikan');
            $table->string('jab_fungsional');
            $table->string('golongan');
            $table->timestamps();
        });
        Schema::table('ipteklains', function (Blueprint $table) {
            $table->foreign('nidn')->references('nidn')->on('dosens');
        });
        Schema::table('bukus', function (Blueprint $table) {
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
        Schema::dropIfExists('dosens');
    }
}
