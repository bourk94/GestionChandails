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
                    'nom' => 'Dehoule',
                    'prenom' => 'Fabrice',
                    'password' => '1234',
                    'courriel' => 'Fabrice@cepeptr.qc.ca',
                ],
            ]);
    }
}
