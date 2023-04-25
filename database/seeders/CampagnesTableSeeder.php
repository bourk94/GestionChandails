<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CampagnesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('campagnes')->insert(
            [
                [
                    'nom_campagne' => 'hiver 2023',
                    'date_debut_campagne' => '2023-01-01',
                    'date_fin_campagne' => '2023-04-30',
                    'date_debut_collecte' => '2023-02-15',
                    'date_fin_collecte' => '2023-02-28',
                    'administrateur_id_creation' => '2',
                    'progression' => 'paiement',
                    //En cours ou terminée
                    'statut' => 'terminée',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'nom_campagne' => 'printemps 2023',
                    'date_debut_campagne' => '2023-05-01',
                    'date_fin_campagne' => '2023-08-31',
                    'date_debut_collecte' => '2023-06-15',
                    'date_fin_collecte' => '2023-06-28',
                    'administrateur_id_creation' => '2',
                    'progression' => 'paiement',
                    //En cours ou terminée
                    'statut' => 'terminée',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'nom_campagne' => 'été 2023',
                    'date_debut_campagne' => '2023-09-01',
                    'date_fin_campagne' => '2023-12-31',
                    'date_debut_collecte' => '2023-10-15',
                    'date_fin_collecte' => '2023-10-28',
                    'administrateur_id_creation' => '2',
                    'progression' => 'intention',
                    //En cours ou terminée
                    'statut' => 'en cours',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
            ]
        );
    }
}
