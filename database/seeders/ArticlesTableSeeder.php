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
    public function run(): void
    {
        DB::table('articles')->insert(
            [
                [
                    'image' => 'Exemple_Chandail_1.jpg',
                    'nom' => 't-shirt',
                    'type' => 'vêtement',
                    'couleur_id' => '1',
                    'taille_id' => '1',
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],

                [
                    'image'=> 'Exemple_Kangourou_1.jpg',
                    'nom' =>'kangourous',
                    'type' => 'vêtement',
                    'couleur_id' => '1',
                    'taille_id' => '1',
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],


            ]);
    }
}
