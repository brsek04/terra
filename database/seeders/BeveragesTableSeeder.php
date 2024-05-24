<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Beverage;

class BeveragesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserta datos de prueba
        Beverage::create([
            'name' => 'Beverage 1',
            'description' => 'description 1',
            'price' => 1000,
            'photo' => 'photo 1',
            'rating' => 5,
            'type_id' => 1,
        ]);

        Beverage::create([
            'name' => 'Beverage 2',
            'description' => 'description 2',
            'price' => 2000,
            'photo' => 'photo 2',
            'rating' => 4,
            'type_id' => 2,
        ]);

        Beverage::create([
            'name' => 'Beverage 3',
            'description' => 'description 3',
            'price' => 3000,
            'photo' => 'photo 3',
            'rating' => 3,
            'type_id' => 3,
        ]);

    }
}
