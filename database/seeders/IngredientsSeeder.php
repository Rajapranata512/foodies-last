<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ingredients')->insert([
            // Bahan untuk Spaghetti Carbonara
            [
                'recipe_id' => 1,
                'name' => 'Spaghetti',
                'quantity' => '200g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 1,
                'name' => 'Pancetta',
                'quantity' => '100g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 1,
                'name' => 'Telur',
                'quantity' => '2 butir',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 1,
                'name' => 'Keju Parmesan',
                'quantity' => '50g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 1,
                'name' => 'Lada Hitam',
                'quantity' => '1 sdt',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Bahan untuk Rendang
            [
                'recipe_id' => 2,
                'name' => 'Daging Sapi',
                'quantity' => '500g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 2,
                'name' => 'Santan Kelapa',
                'quantity' => '400ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 2,
                'name' => 'Bawang Merah',
                'quantity' => '100g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 2,
                'name' => 'Bawang Putih',
                'quantity' => '5 siung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 2,
                'name' => 'Cabai Merah Halus',
                'quantity' => '3 sdm',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Bahan untuk Baklava
            [
                'recipe_id' => 3,
                'name' => 'Kulit Filo',
                'quantity' => '300g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 3,
                'name' => 'Kacang Cincang',
                'quantity' => '200g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 3,
                'name' => 'Sirup Madu',
                'quantity' => '150ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 3,
                'name' => 'Mentega',
                'quantity' => '100g',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Bahan untuk Jollof Rice
            [
                'recipe_id' => 4,
                'name' => 'Beras',
                'quantity' => '300g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 4,
                'name' => 'Tomat',
                'quantity' => '200g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 4,
                'name' => 'Paprika Merah',
                'quantity' => '100g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 4,
                'name' => 'Kaldu Ayam',
                'quantity' => '500ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 4,
                'name' => 'Bawang Bombay',
                'quantity' => '1 buah besar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Bahan untuk Caesar Salad
            [
                'recipe_id' => 5,
                'name' => 'Selada Romaine',
                'quantity' => '200g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 5,
                'name' => 'Crouton',
                'quantity' => '100g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 5,
                'name' => 'Keju Parmesan',
                'quantity' => '50g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 5,
                'name' => 'Saus Caesar',
                'quantity' => '100ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Bahan untuk Ramen
            [
                'recipe_id' => 6,
                'name' => 'Mie Gandum',
                'quantity' => '200g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 6,
                'name' => 'Kuah Kaldu Ayam',
                'quantity' => '500ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 6,
                'name' => 'Irisan Daging Babi',
                'quantity' => '100g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 6,
                'name' => 'Rumput Laut (Nori)',
                'quantity' => '2 lembar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 6,
                'name' => 'Daun Bawang',
                'quantity' => '2 batang',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Bahan untuk Martabak Manis
            [
                'recipe_id' => 7,
                'name' => 'Tepung Terigu',
                'quantity' => '250g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 7,
                'name' => 'Susu Cair',
                'quantity' => '200ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 7,
                'name' => 'Telur',
                'quantity' => '2 butir',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 7,
                'name' => 'Gula Pasir',
                'quantity' => '50g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 7,
                'name' => 'Topping Cokelat',
                'quantity' => '100g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 7,
                'name' => 'Topping Keju',
                'quantity' => '50g',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Bahan untuk Panna Cotta
            [
                'recipe_id' => 8,
                'name' => 'Krim Kental',
                'quantity' => '200ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 8,
                'name' => 'Susu',
                'quantity' => '100ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 8,
                'name' => 'Gula Pasir',
                'quantity' => '50g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 8,
                'name' => 'Gelatin',
                'quantity' => '2 lembar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 8,
                'name' => 'Saus Berry',
                'quantity' => '50ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Bahan untuk Bakpia
            [
                'recipe_id' => 9,
                'name' => 'Tepung Terigu',
                'quantity' => '250g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 9,
                'name' => 'Gula Pasir',
                'quantity' => '50g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 9,
                'name' => 'Kacang Hijau Kupas',
                'quantity' => '200g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 9,
                'name' => 'Margarin',
                'quantity' => '100g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 10,
                'name' => 'Dada Ayam',
                'quantity' => '500g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 10,
                'name' => 'Yogurt',
                'quantity' => '200ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 10,
                'name' => 'Bumbu Kari',
                'quantity' => '3 sdm',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 10,
                'name' => 'Tomat',
                'quantity' => '200g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 10,
                'name' => 'Krim',
                'quantity' => '100ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
            // Bahan untuk Sushi Rolls
            [
                'recipe_id' => 11,
                'name' => 'Nasi Sushi',
                'quantity' => '300g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 11,
                'name' => 'Rumput Laut (Nori)',
                'quantity' => '5 lembar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 11,
                'name' => 'Ikan Salmon Segar',
                'quantity' => '200g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 11,
                'name' => 'Avokad',
                'quantity' => '1 buah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 11,
                'name' => 'Wasabi',
                'quantity' => '1 sdt',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
            // Bahan untuk Onigiri
            [
                'recipe_id' => 12,
                'name' => 'Beras Jepang',
                'quantity' => '200g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 12,
                'name' => 'Ikan Salmon',
                'quantity' => '100g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 12,
                'name' => 'Rumput Laut (Nori)',
                'quantity' => '5 lembar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 12,
                'name' => 'Garam',
                'quantity' => '1/2 sdt',
                'created_at' => now(),
                'updated_at' => now(),
            ],   
        ]);
    }
}
