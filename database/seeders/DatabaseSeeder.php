<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                UsagersTableSeeder::class,
                CampagnesTableSeeder::class,
                CouleursTableSeeder::class,
                TaillesTableSeeder::class,
                ArticlesTableSeeder::class,
                CommandesTableSeeder::class,
                Articles_CampagnesTableSeeder::class,
                Articles_Campagnes_CommandesTableSeeder::class,
                Campagnes_Usagers_ModifierTableSeeder::class,
            ]);
    }
}
