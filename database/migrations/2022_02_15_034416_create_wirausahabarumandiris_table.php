<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWirausahabarumandirisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wirausahabarumandiris', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis');
            $table->string('bukti')->nullable();
            $table->timestamps();
        });
        Schema::table('luarans', function (Blueprint $table) {
            $table->foreignId('wirausaha_baru_mandiri')->nullable()->constrained('wirausahabarumandiris')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wirausahabarumandiris');
    }
}
