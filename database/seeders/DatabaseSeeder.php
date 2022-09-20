<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $fakultas = array(['Fakultas Teknologi Industri (FTI)'],['Fakultas Teknik Sipil dan Perancangan (FTSP)'],['Fakultas Arsitektur dan Design (FAD)']);
        foreach($fakultas as $key =>$value){
            DB::table('fakultas')->insert(['nama'=>$value[0]]);
        }
        $prodi = array(['Teknik Industri','1'],
                    ['Teknik Mesin','1'],
                    ['Teknik Elektro','1'],
                    ['Teknik Kimia','1'],
                    ['Teknik Informatika','1'],
                    ['Teknik Sipil','2'],
                    ['Teknik Geodesi','2'],
                    ['Teknik Lingkungan','2'],
                    ['Teknik Planologi','2'],
                    ['Teknik Arsitektur','3'],
                    ['Desain Interior','3'],
                    ['Desain Produk','3'],
                    ['DKV','3']
                );
        foreach ($prodi as $key=>$value){
            DB::table('prodis')->insert(['nama'=>$value[0],'fakultas'=>$value[1]]);
        }
        DB::table('users')->insert(['name'=>'admin','email'=>'admin@admin.com','role'=>'super admin','password'=>Hash::make('admin')]);
    }
}
