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
                    'grandeur' => 'small',
                    'volume' => 'Null',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
                [
                    'grandeur' => 'medium',
                    'volume' => 'Null',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],      
                [
                    'grandeur' => 'large',
                    'volume' => 'Null',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
                [
                    'grandeur' => 'x-large',
                    'volume' => 'Null',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
                [
                    'grandeur' => 'xx-large',
                    'volume' => 'Null',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],

            ]);
    }
}
