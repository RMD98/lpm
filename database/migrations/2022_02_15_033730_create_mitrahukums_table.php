<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitrahukumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitrahukums', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_badan_hukum');
            $table->string('bidang_usaha');
            $table->string('bukti')->nullable();
            $table->timestamps()->nullable();
        });
        Schema::table('luarans', function (Blueprint $table) {
            $table->foreignId('mitra_berbadan_hukum')->nullable()->constrained('mitrahukums')->nullOnDelete();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mitrahukums');
    }
}
