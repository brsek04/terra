<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DishType;

class DishTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserta datos de prueba
        DishType::create([
            'name' => 'Dish Type 1',
        ]);

        DishType::create([
            'name' => 'Dish Type 2',
        ]);

        DishType::create([
            'name' => 'Dish Type 3',
        ]);
    }
}
