<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class AdministrateursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('administrateurs')->insert(
            [
                [
                    'nom_administrateur' => 'Dehoule',
                    'prenom_administrateur' => 'Fabrice',
                    'password' => Hash::make('1234'),
                    'email' => 'Fabrice@cegeptr.qc.ca',
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'nom_administrateur' => 'Admin',
                    'prenom_administrateur' => 'Admin',
                    'password' => Hash::make('Admin'),
                    'email' => 'admin@cegeptr.qc.ca',
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
            ]);
    }
}
