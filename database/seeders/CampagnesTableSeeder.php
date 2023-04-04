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
                    'administrateur_id_creation' => '1',
                    'administrateur_id_modification' => '1',
                    //intention, paiement, collecte
                    'progression' => 'intention',
                    //En cours ou terminée
                    'statut' => 'en cours',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],                
            ]);
    }
}
