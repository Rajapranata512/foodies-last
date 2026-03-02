<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@kripuk.test'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('AdminKripuk#2026'),
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'demo@kripuk.test'],
            [
                'name' => 'Demo User',
                'password' => Hash::make('DemoPass123!'),
                'role' => 'user',
            ]
        );

        $this->call([
            RecipesSeeder::class,
            IngredientsSeeder::class,
            StepsSeeder::class,
            EquipmentsSeeder::class,
        ]);
    }
}
