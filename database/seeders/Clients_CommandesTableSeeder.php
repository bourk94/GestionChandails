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
                    'commande_id' => '1',
                    'client_id' => '1',
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
            ]);
    }
}
