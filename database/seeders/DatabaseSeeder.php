<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DishTypesTableSeeder::class);
    $this->call(CategoriesTableSeeder::class);
    $this->call(DishesTableSeeder::class);
    $this->call(BeverageTypesTableSeeder::class);
    $this->call(BeveragesTableSeeder::class);
    $this->call(CompaniesTableSeeder::class);
    $this->call(BranchesTableSeeder::class);
    $this->call(MenusTableSeeder::class);
    $this->call(SeederTablaPermisos::class);
    $this->call(RoleSeeder::class); 
    $this->call(AdminUserSeeder::class);
        
    }
}
