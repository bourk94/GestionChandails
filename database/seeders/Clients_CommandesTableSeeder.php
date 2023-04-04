<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class Clients_CommandesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('client_commande')->insert(
            [
                [
                    'id_commande' => '',
                    'id_client' => ''
                ],
            ]);
    }
}
