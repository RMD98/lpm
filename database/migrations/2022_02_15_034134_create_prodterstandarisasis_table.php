<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdterstandarisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodterstandarisasis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('nidn');
            $table->string('instansi');
            $table->string('no_keputusan');
            $table->string('bukti')->nullable();
            $table->timestamps();
        });

        Schema::table('prodterstandarisasis', function (Blueprint $table) {
            $table->foreign('nidn')
                  ->references('nidn')
                  ->on('dosens')
                  ->cascadeOnUpdate();
        });
        Schema::table('luarans', function (Blueprint $table) {
            $table->foreignId('prod_terstandarisasi')->nullable()->constrained('prodterstandarisasis')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prodterstandarisasis');
    }
}
