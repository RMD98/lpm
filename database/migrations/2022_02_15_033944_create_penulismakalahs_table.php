<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenulismakalahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penulismakalahs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_makalah');
            $table->string('nidn');
            $table->timestamps();
        });

        Schema::table('penulismakalahs', function (Blueprint $table) {
            $table->foreign('nidn')
                   ->references('nidn')
                   ->on('dosens')
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
        Schema::dropIfExists('penulismakalahs');
    }
}
