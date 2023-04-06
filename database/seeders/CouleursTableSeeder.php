<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CouleursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('couleurs')->insert(
            [
                [
                    'nom_couleur' => 'Black',
                    'code_couleur' => '#000000',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
                [
                    'nom_couleur' => 'Navy',
                    'code_couleur' => '#000080',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],      
                [
                    'nom_couleur' => 'Purple',
                    'code_couleur' => '#800080',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
                [
                    'nom_couleur' => 'Forest Green',
                    'code_couleur' => '#228B22',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
                [
                    'nom_couleur' => 'Antique Sapphire',
                    'code_couleur' => '#FAEBD7',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
                [
                    'nom_couleur' => 'Red',
                    'code_couleur' => '#FF0000',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
                [
                    'nom_couleur' => 'Military green',
                    'code_couleur' => '#BDB76B',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
                [
                    'nom_couleur' => 'Dark Chocolate',
                    'code_couleur' => '#D2691E',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ] ,
                [
                    'nom_couleur' => 'Dark Heather',
                    'code_couleur' => '#A9A9A9',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
                [
                    'nom_couleur' => 'Antique Cherry Red',
                    'code_couleur' => '#CD5C5C',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ], 
                [
                    'nom_couleur' => 'Jade Dome',
                    'code_couleur' => '#00FFFF',
                    'created_at' =>date('Y-m-d H:i:s'),
                    'updated_at' =>date('Y-m-d H:i:s')
                ],
            ]);
    }
}
