<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                    'id_article' => '',
                    'nom' => '',
                    'type' => '',
                    'nom_couleur' => '',
                    'id_taille' => ''
                ],
            ]);
    }
}
