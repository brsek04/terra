<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BeverageType;

class BeverageTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserta datos de prueba
        BeverageType::create([
            'name' => 'Beverage Type 1',
        ]);

        BeverageType::create([
            'name' => 'Beverage Type 2',
        ]);

        BeverageType::create([
            'name' => 'Beverage Type 3',
        ]);
    }
}
