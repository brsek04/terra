<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserta datos de prueba
        Branch::create([
            'name' => 'Branch 1',
            'address' => 'address 1',
            'phone' => '123456789',
            'company_id' => 1,
            'commune_id' => 1,
        ]);

        Branch::create([
            'name' => 'Branch 2',
            'address' => 'address 2',
            'phone' => '987654321',
            'company_id' => 2,
            'commune_id' => 2,
        ]);

        Branch::create([
            'name' => 'Branch 3',
            'address' => 'address 3',
            'phone' => '123456789',
            'company_id' => 3,
            'commune_id' => 3,
        ]);
    }
}
