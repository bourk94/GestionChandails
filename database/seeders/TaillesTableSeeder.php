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
                    'grandeur' => 'S',
                    'volume' => 'Null',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
                [
                    'grandeur' => 'M',
                    'volume' => 'Null',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],      
                [
                    'grandeur' => 'L',
                    'volume' => 'Null',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
                [
                    'grandeur' => 'XL',
                    'volume' => 'Null',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
                [
                    'grandeur' => 'XXL',
                    'volume' => 'Null',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],

            ]);
    }
}
