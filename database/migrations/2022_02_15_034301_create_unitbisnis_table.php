<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitbisnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unitbisnis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('deskripsi');
            $table->string('nosk');
            $table->string('SKPUB');
            $table->string('LKUB');
            $table->string('Invoice');
            $table->timestamps();

        });
        Schema::table('mitraubs', function (Blueprint $table) {
            $table->foreignId('id_ub')->constrained('unitbisnis')
                  ->cascadeOnUpdate();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unitbisnis');
    }
}
