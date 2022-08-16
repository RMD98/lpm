<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitrapkmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitrapkms', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('manfaat');
            $table->timestamps()->nullable();
        });
        Schema::table('mitrapkms', function (Blueprint $table) {
            $table->foreignId('id_pkm')->constrained('pkms')->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->foreignId('id_mitra')->constrained('mitras')->cascadeOnUpdate()
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
        Schema::dropIfExists('mitrapkms');
    }
}
