<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TaillesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tailles')->insert(
            [
                [
                    'id_taille' => '',
                    'grandeur' => '',
                    'volume' => ''
                ],
            ]);
    }
}
