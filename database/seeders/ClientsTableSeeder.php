<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
                    'password' => Hash::make('patate'),
                    'email' => 'alexandre@cegeptr.qc.ca',                    
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
                [
                    'nom_client' => 'Client',
                    'prenom_client' => 'Client',                    
                    'password' => Hash::make('Client'),
                    'email' => 'client@client.com',                    
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
                [
                    'nom_client' => 'Client',
                    'prenom_client' => 'Client',                    
                    'password' => Hash::make('Client'),
                    'email' => 'alexandre.bourque.04@edu.cegeptr.qc.ca',                    
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
            ]);
    }
}
