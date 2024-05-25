<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserta datos de prueba
        Company::create([
            'name' => 'Company 1',
            'address' => 'address 1',
            'phone' => '123456789',
        ]);

        Company::create([
            'name' => 'Company 2',
            'address' => 'address 2',
            'phone' => '987654321',
        ]);

        Company::create([
            'name' => 'Company 3',
            'address' => 'address 3',
            'phone' => '123456789',
        ]);
    }
}
