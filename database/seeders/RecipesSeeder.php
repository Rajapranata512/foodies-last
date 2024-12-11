<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('recipes')->insert([
            [
                'name' => 'Spaghetti Carbonara',
                'cuisine' => 'Western',
                'description' => 'Pasta klasik Italia yang terbuat dari telur, keju, pancetta, dan lada hitam.',
                'meal_course' => 'Main Course',
                'time' => 30,
                'origin' => 'Italy',
                'difficulty' => 'Medium',
                'image' => 'images/carbonara.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rendang',
                'cuisine' => 'Asian',
                'description' => 'Rendang adalah makanan khas Indonesia yang kaya akan rempah yang terbuat dari daging sapi',
                'meal_course' => 'Main Course',
                'time' => 30,
                'origin' => 'Indonesia',
                'difficulty' => 'Medium',
                'image' =>'images/rendang.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Baklava',
                'cuisine' => 'Middle Eastern',
                'description' => 'Makanan penutup yang terbuat dari lapisan filo, diisi dengan kacang cincang, dan dimaniskan dengan sirup atau madu. Rasa dominan manis.',
                'meal_course' => 'Dessert',
                'time' => 60,
                'origin' => 'Turkey',
                'difficulty' => 'Hard',
                'image' => 'images/baklava.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jollof Rice',
                'cuisine' => 'African',
                'description' => 'Hidangan nasi yang kaya rasa dimasak dengan tomat, bawang, dan rempah-rempah, sering disajikan dengan daging atau ikan. Rasa dominan gurih.',
                'meal_course' => 'Main Course',
                'time' => 40,
                'origin' => 'West Africa',
                'difficulty' => 'Medium',
                'image' => 'images/jollof_rice.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Caesar Salad',
                'cuisine' => 'Western',
                'description' => 'Salad segar yang dibuat dengan selada romaine, crouton, keju Parmesan, dan saus Caesar. Rasa dominan asam dan gurih.',
                'meal_course' => 'Appetizer',
                'time' => 15,
                'origin' => 'Mexico',
                'difficulty' => 'Easy',
                'image' => 'images/caesar_salad.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ramen',
                'cuisine' => 'Asian',
                'description' => 'Hidangan sup mie yang lezat, terdiri dari mie gandum yang disajikan dalam kuah berbasis daging atau ikan, dibumbui dengan kecap asin atau miso, dan dilengkapi dengan topping seperti irisan daging babi, nori, dan daun bawang.',
                'meal_course' => 'Main Course',
                'time' => 45,
                'origin' => 'Japan',
                'difficulty' => 'Medium',
                'image' => 'images/ramen.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Martabak Manis',
                'cuisine' => 'Asian',
                'description' => 'Pancake tebal khas Indonesia yang diisi atau diberi topping seperti cokelat, kacang, keju, dan susu kental manis. Martabak manis memiliki tekstur lembut dan rasa manis yang khas, sering disajikan sebagai camilan atau hidangan penutup.',
                'meal_course' => 'Dessert',
                'time' => 50,
                'origin' => 'Indonesia',
                'difficulty' => 'Easy',
                'image' => 'images/martabak_manis.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Panna Cota',
                'cuisine' => 'Western',
                'description' => 'Buah dessert yang berasal dari Italy yang merupakan pudding berbahan dasar cream yang dimasak dengan gelatine dan diberi berbagai macam rasa atau saus berry.',
                'meal_course' => 'Dessert',
                'time' => 30,
                'origin' => 'Italy',
                'difficulty' => 'Hard',
                'image' => 'images/panna_cota.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bakpia',
                'cuisine' => 'Asian',
                'description' => 'Kue tradisional khas Indonesia berbentuk bulat pipih dengan kulit tipis yang diisi dengan berbagai macam isian, seperti kacang hijau, cokelat, atau keju. Bakpia terkenal sebagai oleh-oleh khas Yogyakarta.',
                'meal_course' => 'Dessert',
                'time' => 90,
                'origin' => 'Indonesia',
                'difficulty' => 'Medium',
                'image' => 'images/bakpia.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chicken Tikka Masala',
                'cuisine' => 'Asian',
                'description' => 'Hidangan lezat berupa ayam yang dimarinasi dan dimasak dalam saus kari tomat yang creamy.',
                'meal_course' => 'Main Course',
                'time' => 45,
                'origin' => 'India',
                'difficulty' => 'Medium',
                'image' => 'images/chicken_tikka_masala.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sushi Rolls',
                'cuisine' => 'Asian', 
                'description' => 'Gulungan nasi yang diisi dengan ikan segar, sayuran, dan dibungkus dengan rumput laut.',
                'meal_course' => 'Appetizer',
                'time' => 40,
                'origin' => 'Japan',
                'difficulty' => 'Hard',
                'image' => 'images/sushi_rolls.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Onigiri',
                'cuisine' => 'Asian',
                'description' => 'Makanan khas Jepang berupa nasi yang dibentuk menjadi segitiga atau bulat, biasanya diisi dengan isian seperti ikan salmon, tuna, atau umeboshi, dan dibungkus dengan nori (rumput laut). Onigiri sering dijadikan bekal atau camilan praktis.',
                'meal_course' => 'Main Course',
                'time' => 15,
                'origin' => 'Japan',
                'difficulty' => 'Easy',
                'image' => 'images/onigiri.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
