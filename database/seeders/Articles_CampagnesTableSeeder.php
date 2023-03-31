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
        DB::table('campagnes')->insert(
            [
                [
                    'nom_campagne' => '',
                    'date_debut_campagne' => '',
                    'date_fin_campagne' => '',
                    'date_debut_collecte' => '',
                    'date_fin_collecte' => '',
                    'id_admin_creation' => '',
                    'id_admin_modification' => '',
                    'progression' => '',
                    'statut' => '',
                ],
            ]);
    }
}
