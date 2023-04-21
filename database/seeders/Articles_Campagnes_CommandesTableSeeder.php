<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Articles_Campagnes_CommandesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('article_campagne_commande')->insert(
            [
                [
                    'commande_id'=>'1',
                    'article_campagne_id' => '1',
                    'quantite' => '1',
                    'montant_total' => '1',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
            ]
        )

    }
}
