<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StepsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('steps')->insert([
            // Steps untuk Spaghetti Carbonara
            [
                'recipe_id' => 1,
                'step_number' => 1,
                'description' => 'Rebus pasta hingga al dente, tiriskan, dan sisihkan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 1,
                'step_number' => 2,
                'description' => 'Potong pancetta menjadi potongan kecil dan masak hingga renyah.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 1,
                'step_number' => 3,
                'description' => 'Campur telur, keju Parmesan, garam, dan lada dalam mangkuk.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 1,
                'step_number' => 4,
                'description' => 'Campurkan pasta panas dengan pancetta, lalu tambahkan campuran telur dan keju.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 1,
                'step_number' => 5,
                'description' => 'Aduk hingga saus mengental, sajikan segera.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Steps untuk Rendang
            [
                'recipe_id' => 2,
                'step_number' => 1,
                'description' => 'Potong daging sapi sesuai ukuran yang diinginkan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 2,
                'step_number' => 2,
                'description' => 'Tumis bumbu halus (bawang merah, bawang putih, cabai) hingga harum.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 2,
                'step_number' => 3,
                'description' => 'Masukkan santan dan rempah-rempah, masak hingga mendidih.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 2,
                'step_number' => 4,
                'description' => 'Tambahkan potongan daging sapi, masak dengan api kecil hingga empuk.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 2,
                'step_number' => 5,
                'description' => 'Aduk sesekali hingga kuah mengental dan menjadi bumbu kering.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
             // Steps untuk Baklava
            [
                'recipe_id' => 3,
                'step_number' => 1,
                'description' => 'Panaskan oven hingga 180°C.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 3,
                'step_number' => 2,
                'description' => 'Oleskan mentega pada loyang, susun lapisan filo pastry satu per satu.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 3,
                'step_number' => 3,
                'description' => 'Taburkan kacang cincang di antara lapisan filo.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 3,
                'step_number' => 4,
                'description' => 'Panggang hingga lapisan filo berwarna keemasan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 3,
                'step_number' => 5,
                'description' => 'Tuangkan sirup manis di atas baklava dan biarkan meresap.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Steps untuk Jollof Rice
            [
                'recipe_id' => 4,
                'step_number' => 1,
                'description' => 'Panaskan minyak di wajan, tumis bawang dan paprika hingga harum.',
                'created_at' => now(),
                'updated_at' => now(),
            ]   ,
            [
                'recipe_id' => 4,
                'step_number' => 2,
                'description' => 'Tambahkan tomat, cabai, dan bumbu rempah, masak hingga matang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 4,
                'step_number' => 3,
                'description' => 'Masukkan kaldu ayam, biarkan mendidih.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 4,
                'step_number' => 4,
                'description' => 'Tambahkan beras mentah, tutup dan masak dengan api kecil hingga matang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 4,
                'step_number' => 5,
                'description' => 'Aduk nasi perlahan sebelum disajikan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Steps untuk Caesar Salad
            [
                'recipe_id' => 5,
                'step_number' => 1,
                'description' => 'Cuci bersih selada romaine, potong sesuai ukuran yang diinginkan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 5,
                'step_number' => 2,
                'description' => 'Campur crouton dengan keju Parmesan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 5,
                'step_number' => 3,
                'description' => 'Tuangkan saus Caesar di atas campuran salad, aduk rata.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 5,
                'step_number' => 4,
                'description' => 'Tambahkan topping keju Parmesan sebelum disajikan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Steps untuk Ramen
            [
                'recipe_id' => 6,
                'step_number' => 1,
                'description' => 'Rebus mie ramen hingga matang, tiriskan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 6,
                'step_number' => 2,
                'description' => 'Panaskan kuah berbasis daging atau ikan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 6,
                'step_number' => 3,
                'description' => 'Tambahkan topping seperti irisan daging babi, nori, dan daun bawang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 6,
                'step_number' => 4,
                'description' => 'Sajikan ramen dengan kuah panas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                // Steps untuk Martabak Manis
            [
                'recipe_id' => 7,
                'step_number' => 1,
                'description' => 'Campurkan tepung, gula, ragi, dan susu dalam mangkuk besar.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 7,
                'step_number' => 2,
                'description' => 'Tuangkan air sedikit demi sedikit, aduk hingga menjadi adonan kental.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 7,
                'step_number' => 3,
                'description' => 'Diamkan adonan selama 1 jam hingga mengembang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 7,
                'step_number' => 4,
                'description' => 'Panaskan wajan datar, tuangkan adonan hingga merata.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 7,
                'step_number' => 5,
                'description' => 'Taburi topping seperti cokelat, kacang, atau keju sebelum disajikan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Steps untuk Panna Cotta
            [
                'recipe_id' => 8,
                'step_number' => 1,
                'description' => 'Panaskan krim dan susu dalam panci, tambahkan gula.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 8,
                'step_number' => 2,
                'description' => 'Larutkan gelatin dalam air dingin, lalu campurkan ke dalam krim panas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 8,
                'step_number' => 3,
                'description' => 'Tuang campuran krim ke dalam cetakan dan dinginkan hingga mengeras.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 8,
                'step_number' => 4,
                'description' => 'Sajikan dengan saus berry atau buah segar di atasnya.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Steps untuk Bakpia
            [
                'recipe_id' => 9,
                'step_number' => 1,
                'description' => 'Campur tepung, gula, dan air untuk membuat adonan kulit.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 9,
                'step_number' => 2,
                'description' => 'Isi adonan dengan kacang hijau yang telah dimasak dan dibumbui.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 9,
                'step_number' => 3,
                'description' => 'Bentuk adonan menjadi bulat pipih.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 9,
                'step_number' => 4,
                'description' => 'Panggang dalam oven hingga kulitnya keemasan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Steps untuk Chicken Tikka Masala
            [
                'recipe_id' => 10,
                'step_number' => 1,
                'description' => 'Potong ayam menjadi potongan kecil, lalu marinasi dengan yogurt dan rempah-rempah.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 10,
                'step_number' => 2,
                'description' => 'Panggang ayam hingga matang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 10,
                'step_number' => 3,
                'description' => 'Tumis bawang bombay dan bawang putih hingga harum, tambahkan tomat dan bumbu.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 10,
                'step_number' => 4,
                'description' => 'Masukkan ayam panggang ke dalam saus kari, masak hingga bumbu meresap.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 10,
                'step_number' => 5,
                'description' => 'Sajikan dengan nasi atau roti naan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Steps untuk Sushi Rolls
            [
                'recipe_id' => 11,
                'step_number' => 1,
                'description' => 'Cuci beras sushi hingga bersih, masak dengan air hingga matang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 11,
                'step_number' => 2,
                'description' => 'Tambahkan cuka sushi ke dalam nasi yang masih hangat, aduk rata.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 11,
                'step_number' => 3,
                'description' => 'Letakkan nori di atas mat sushi, tambahkan nasi dan isian seperti ikan, sayuran, atau alpukat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 11,
                'step_number' => 4,
                'description' => 'Gulung nori dengan isian hingga rapat, potong menjadi bagian kecil.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Steps untuk Onigiri
            [
                'recipe_id' => 12,
                'step_number' => 1,
                'description' => 'Rebus beras sushi hingga matang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 12,
                'step_number' => 2,
                'description' => 'Bentuk nasi menjadi segitiga atau bulat, tambahkan isian di tengah.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 12,
                'step_number' => 3,
                'description' => 'Bungkus nasi dengan nori.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 12,
                'step_number' => 4,
                'description' => 'Sajikan sebagai camilan atau bekal.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
