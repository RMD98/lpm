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
            $table->timestamps();
        });
        Schema::table('luarans', function (Blueprint $table) {
            $table->foreignId('jurnal_internasional')->constrained('jurnalints');
            $table->foreignId('forum_ilmiah')->constrained('forums');
            $table->foreignId('haki')->constrained('hakis');
            $table->foreignId('iptek_lain')->constrained('ipteklains');
            $table->foreignId('buku')->constrained('bukus');
            $table->foreignId('id_pkm')->constrained('pkms');
        
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
