<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdtersertifikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodtersertifikasis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('nidn');
            $table->string('instansi');
            $table->string('no_keputusan');
            $table->string('bukti');
            $table->timestamps();
        });

        Schema::table('prodtersertifikasis', function (Blueprint $table) {
            $table->foreign('nidn')
                  ->references('nidn')
                  ->on('dosens')
                  ->cascadeOnUpdate();
        
        });
        Schema::table('luarans', function (Blueprint $table) {
            $table->foreignId('prod_tersertifikasi')->constrained('prodtersertifikasis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prodtersertifikasis');
    }
}
