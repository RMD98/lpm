<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnalints', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('nama');
            $table->string('jenis');
            $table->string('url');
            $table->string('p_issn');
            $table->string('e_issn');
            $table->string('volume');
            $table->string('nomor');
            $table->string('halaman');
            $table->string('bukti')->nullable();
            $table->timestamps();
        });
        Schema::table('luarans', function (Blueprint $table) {
            $table->foreignId('jurnal_internasional')->nullable()->constrained('jurnalints')->nullOnDelete();
        });
        
        Schema::table('penulisjurnals', function (Blueprint $table) {
            $table->foreign('nidn')
                  ->references('nidn')
                  ->on('dosens')
                  ->cascadeOnUpdate();
            $table->foreignId('id_jurnal')
                  ->references('id')
                  ->on('jurnalints')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnalints');
    }
}
