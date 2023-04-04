<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert(
            [
                [
                    'nom_client' => 'Blais Ouellette',
                    'prenom_client' => 'Alexandre',
                    'adresse_client' => '1 première rue',
                    'password' => 'patate',
                    'email' => 'alexandre@cegeptr.qc.ca',
                    'telephone_client' => '111-111-1111',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
            ]);
    }
}
