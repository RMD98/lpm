<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenulishakisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penulishakis', function (Blueprint $table) {
            $table->id();
            $table->string('nidn');
            $table->timestamps();
        });

        Schema::table('penulishakis', function (Blueprint $table) {
            $table->foreign('nidn')
                  ->references('nidn')
                  ->on('dosens')
                  ->cascadeOnUpdate();
            $table->foreignId('id_haki')
                  ->references('id')
                  ->on('hakis')
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
        Schema::dropIfExists('penulishakis');
    }
}
