<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class Articles_CampagnesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('article_campagne')->insert(
            [
                [
                    'campagne_id' => '3',
                    'article_id' => '1',
                    'couleur' => '1',
                    'taille' => '1',
                    'quantite_max' => '3',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
                [
                    'campagne_id' => '3',
                    'article_id' => '2',
                    'couleur_id' => '2',
                    'taille_id' => '2',
                    'quantite_max' => '5',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
                [
                    'campagne_id' => '3',
                    'article_id' => '2',
                    'couleur_id' => '3',
                    'taille_id' => '2',
                    'quantite_max' => '5',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
                [
                    'campagne_id' => '3',
                    'article_id' => '2',
                    'couleur_id' => '3',
                    'taille_id' => '4',
                    'quantite_max' => '5',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
            ]);
    }
}
