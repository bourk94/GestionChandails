<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
                    'password' => '1234',
                    'email' => 'Fabrice@cepeptr.qc.ca',
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
            ]);
    }
}
