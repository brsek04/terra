<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dish;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserta datos de prueba
        Dish::create([
            'name' => 'Dish 1',
            'description' => 'description 1',
            'price' => 1000,
            'photo' => 'photo 1',
            'rating' => 5,
            'type_id' => 1,
            'category_id' => 1,
        ]);

        Dish::create([
            'name' => 'Dish 2',
            'description' => 'description 2',
            'price' => 2000,
            'photo' => 'photo 2',
            'rating' => 4,
            'type_id' => 2,
            'category_id' => 2,
        ]);

        Dish::create([
            'name' => 'Dish 3',
            'description' => 'description 3',
            'price' => 3000,
            'photo' => 'photo 3',
            'rating' => 3,
            'type_id' => 3,
            'category_id' => 1,
        ]);
    }
}
