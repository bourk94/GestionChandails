<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    //Les types à utiliser sont: chandail, kangourou et accessoire    
    public function run(): void
    {
        DB::table('articles')->insert(
            [
                // [
                //     'nom' => 't-shirt',
                //     'type' => 'vêtement',
                //     'description' => 't-shirt',
                //     'created_at'=> date('Y-m-d H:i:s'),
                //     'updated_at' => date('Y-m-d H:i:s')
                // ],

                // [
                //     'nom' =>'kangourous',
                //     'type' => 'vêtement',
                //     'description' => 'kangourous',
                //     'created_at'=> date('Y-m-d H:i:s'),
                //     'updated_at' => date('Y-m-d H:i:s')
                // ],


            ]);
    }
}
