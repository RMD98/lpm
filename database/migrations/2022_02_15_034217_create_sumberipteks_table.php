<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSumberipteksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sumberipteks', function (Blueprint $table) {
            $table->id();
            $table->string('sumber');
            $table->timestamps()->nullable();
        });
        $data = array('Tidak ada','Paten','Paten sederhana',
                'Perlindungan varietas tanaman','Hak Cipta',
                'Merek Dagang','Rahasia dagang',
                'Desain Produk Industri','Indikasi Geografis',
                'Perlindungan Desain Tata Letak Sirkuit Terpadu',
                'Teknologi Tepat Guna','Model','Purwarupa (Prototype)',
                'Karya Desain/Seni/ Kriya/Bangunan dan Arsitektur','Rekayasa Sosial');
        
        foreach($data as $key=>$value){
            DB::table('sumberipteks')->insert(['sumber'=>$data[$key]]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sumberipteks');
    }
}
