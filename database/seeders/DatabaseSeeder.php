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
                SuperAdminsTableSeeder::class,
                AdministrateursTableSeeder::class,
                CampagnesTableSeeder::class,
                CouleursTableSeeder::class,
                TaillesTableSeeder::class,
                ArticlesTableSeeder::class,
                ClientsTableSeeder::class,
                CommandesTableSeeder::class,
                Articles_CampagnesTableSeeder::class,
                Articles_CommandesTableSeeder::class,
                Clients_CommandesTableSeeder::class,
                UsagersTableSeeder::class
            ]);
    }
}
