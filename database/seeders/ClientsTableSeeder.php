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
                    'password' => 'patate',
                    'email' => 'alexandre@cegeptr.qc.ca',                    
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
            ]);
    }
}
