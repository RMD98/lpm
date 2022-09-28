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
        $prodi = array(['11','Teknik Industri','1'],
                    ['12','Teknik Mesin','1'],
                    ['13','Teknik Elektro','1'],
                    ['14','Teknik Kimia','1'],
                    ['15','Teknik Informatika','1'],
                    ['16','Teknik Sipil','2'],
                    ['17','Teknik Geodesi','2'],
                    ['18','Teknik Lingkungan','2'],
                    ['19','Teknik Planologi','2'],
                    ['20','Teknik Arsitektur','3'],
                    ['21','Desain Interior','3'],
                    ['22','Desain Produk','3'],
                    ['23','DKV','3']
                );
        foreach ($prodi as $key=>$value){
            DB::table('prodis')->insert(['kode'=>$value[0],'nama'=>$value[1],'fakultas'=>$value[2]]);
        }
        DB::table('users')->insert(['name'=>'admin','email'=>'admin@admin.com','role'=>'super admin','password'=>Hash::make('admin')]);
    }
}
