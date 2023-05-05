<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CommandesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('commandes')->insert(
            [
                // [
                //     'date_commande' => '2023-02-07',
                //     'usager_id' => '1',
                //     'created_at'=> date('Y-m-d H:i:s'),
                //     'updated_at' => date('Y-m-d H:i:s')
                // ],
                // [
                //     'date_commande' => '2023-02-07',
                //     'usager_id' => '4',
                //     'created_at'=> date('Y-m-d H:i:s'),
                //     'updated_at' => date('Y-m-d H:i:s')
                // ],
            ]);
    }
}
