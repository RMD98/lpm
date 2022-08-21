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
            $table->string('SKPUB')->nullable();
            $table->string('LKUB')->nullable();
            $table->string('Invoice')->nullable();
            $table->timestamps();

        });
        Schema::table('mitraubs', function (Blueprint $table) {
            $table->foreignId('id_ub')->constrained('unitbisnis')
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
        Schema::dropIfExists('unitbisnis');
    }
}
