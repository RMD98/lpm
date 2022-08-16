<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLuaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luarans', function (Blueprint $table) {
            $table->id();
            $table->timestamps()->nullable();
        });
        Schema::table('luarans', function (Blueprint $table) {
            $table->foreignId('forum_ilmiah')->nullable()->constrained('forums')->nullOnDelete();
            $table->foreignId('haki')->nullable()->constrained('hakis')->nullOnDelete();
            $table->foreignId('iptek_lain')->nullable()->constrained('ipteklains')->nullOnDelete();
            $table->foreignId('buku')->nullable()->constrained('bukus')->nullOnDelete();
            $table->foreignId('id_pkm')->constrained('pkms')->cascadeOnDelete();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('luarans');
    }
}
