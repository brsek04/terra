<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        menu::create([
            'name' => 'Menu 1',
            'branch_id' => 1,
        ]);

        menu::create([
            'name' => 'Menu 2',
            'branch_id' => 2,
        ]);

        menu::create([
            'name' => 'Menu 3',
            'branch_id' => 3,
        ]);

    }
}
