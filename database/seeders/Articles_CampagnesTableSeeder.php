<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class Articles_CampagnesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('article_campagne')->insert(
            [
                [
                    'id_campagne' => '',
                    'id_article' => ''
                ],
            ]);
    }
}
