<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('fakultas');
            $table->timestamps();
        });
        
        $data = array(['Teknik Industri','Fakultas Teknologi Industri (FTI)'],
                    ['Teknik Mesin','Fakultas Teknologi Industri (FTI)'],
                    ['Teknik Elektro','Fakultas Teknologi Industri (FTI)'],
                    ['Teknik Kimia','Fakultas Teknologi Industri (FTI)'],
                    ['Teknik Informatika','Fakultas Teknologi Industri (FTI)'],
                    ['Teknik Sipil','Fakultas Teknik Sipil dan Perencanaan (FTSP)'],
                    ['Teknik Geodesi','Fakultas Teknik Sipil dan Perencanaan (FTSP)'],
                    ['Teknik Lingkungan','Fakultas Teknik Sipil dan Perencanaan (FTSP)'],
                    ['Teknik Planologi','Fakultas Teknik Sipil dan Perencanaan (FTSP)'],
                    ['Teknik Arsitektur','Fakultas Arsitektur dan Design (FAD)'],
                    ['Desain Interior','Fakultas Arsitektur dan Design (FAD)'],
                    ['Desain Produk','Fakultas Arsitektur dan Design (FAD)'],
                    ['DKV','Fakultas Arsitektur dan Design (FAD)']
                );
        foreach ($data as $key=>$value){
            DB::table('prodis')->insert(['nama'=>$data[$key][0],'fakultas'=>$data[$key][1]]);
        } 
    }   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prodis');
    }
}
