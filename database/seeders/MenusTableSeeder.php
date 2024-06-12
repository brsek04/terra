<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Menu::create([
            'name' => 'Menu 1',
            'branch_id' => 1,
        ]);

        Menu::create([
            'name' => 'Menu 2',
            'branch_id' => 2,
        ]);

        Menu::create([
            'name' => 'Menu 3',
            'branch_id' => 3,
        ]);

    }
}
