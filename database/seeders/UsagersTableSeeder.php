<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UsagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usagers')->insert(
            [
                [
                    'nom' => 'Client',
                    'prenom' => 'Client',                    
                    'password' => Hash::make('Client'),
                    'email' => 'client@client.com',
                    'type' => 'client',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
                [
                    'nom' => 'Admin',
                    'prenom' => 'Admin',
                    'password' => Hash::make('Admin'),
                    'email' => 'admin@cegeptr.qc.ca',
                    'type' => 'admin',
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [

                    'nom' => 'SuperAdmin',
                    'prenom' => 'SuperAdmin',
                    'password' => Hash::make('SuperAdmin'),
                    'email' => 'superadmin@superadmin.com',
                    'type' => 'superadmin',
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'nom' => 'Client1',
                    'prenom' => 'Client1',                    
                    'password' => Hash::make('Client'),
                    'email' => 'testprojetfabrice.n4r1w@8shield.net',
                    'type' => 'client',                    
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')

                ],
                [ // TEST D'AFFICHAGE DES ADMINISTRATEURS
                    'nom' => 'Admin',
                    'prenom' => 'Admin',
                    'password' => Hash::make('Admin'),
                    'email' => 'admin1@cegeptr.qc.ca',
                    'type' => 'admin',
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'nom' => 'Admin',
                    'prenom' => 'Admin',
                    'password' => Hash::make('Admin'),
                    'email' => 'admin2@cegeptr.qc.ca',
                    'type' => 'admin',
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'nom' => 'Admin',
                    'prenom' => 'Admin',
                    'password' => Hash::make('Admin'),
                    'email' => 'admin3@cegeptr.qc.ca',
                    'type' => 'admin',
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ], // TEST D'AFFICHAGE DES ADMINISTRATEURS
            ]);
    }
}
