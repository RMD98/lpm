<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('jabatan');
            $table->string('status');
            $table->string('nama');
            $table->string('nidn_nrp');
            $table->string('pekerjaan');
            $table->string('instansi');
            $table->string('alamat');
            $table->string('nohp');
            $table->string('prodi');
            $table->year('thn_lulus');
            $table->timestamps();
        });
        Schema::table('anggotas', function (Blueprint $table) {
            $table->foreignId('id_pkm')->constrained('pkms')->cascadeOnUpdate()
            ->cascadeOnDelete();;
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggotas');
    }
}
