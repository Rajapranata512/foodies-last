<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('equipments')->insert([
            // Peralatan untuk Spaghetti Carbonara
            [
                'recipe_id' => 1,
                'name' => 'Panci',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 1,
                'name' => 'Penggorengan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 1,
                'name' => 'Mangkuk Besar',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peralatan untuk Rendang
            [
                'recipe_id' => 2,
                'name' => 'Wajan Besar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 2,
                'name' => 'Pisau',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 2,
                'name' => 'Talenan',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peralatan untuk Baklava
            [
                'recipe_id' => 3,
                'name' => 'Loyang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 3,
                'name' => 'Kuas Kue',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 3,
                'name' => 'Pisau',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peralatan untuk Jollof Rice
            [
                'recipe_id' => 4,
                'name' => 'Wajan Besar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 4,
                'name' => 'Sendok Kayu',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peralatan untuk Caesar Salad
            [
                'recipe_id' => 5,
                'name' => 'Mangkuk Salad',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 5,
                'name' => 'Pisau',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peralatan untuk Ramen
            [
                'recipe_id' => 6,
                'name' => 'Panci',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 6,
                'name' => 'Mangkuk Sup',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 6,
                'name' => 'Sendok Sup',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peralatan untuk Martabak Manis
            [
                'recipe_id' => 7,
                'name' => 'Wajan Martabak',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 7,
                'name' => 'Spatula',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peralatan untuk Panna Cotta
            [
                'recipe_id' => 8,
                'name' => 'Panci Kecil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 8,
                'name' => 'Cetakan Pudding',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peralatan untuk Bakpia
            [
                'recipe_id' => 9,
                'name' => 'Loyang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 9,
                'name' => 'Rolling Pin',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peralatan untuk Chicken Tikka Masala
            [
                'recipe_id' => 10,
                'name' => 'Panggangan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 10,
                'name' => 'Panci',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peralatan untuk Sushi Rolls
            [
                'recipe_id' => 11,
                'name' => 'Tikar Sushi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 11,
                'name' => 'Pisau Tajam',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Peralatan untuk Onigiri
            [
                'recipe_id' => 12,
                'name' => 'Cetakan Onigiri',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 12,
                'name' => 'Mangkuk Nasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
