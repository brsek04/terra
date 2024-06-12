<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $permissions = Permission::pluck('id','id')->all();

        $role = Role::updateOrCreate(['name' => 'admin'], ['guard_name' => 'web']);
        $role->syncPermissions($permissions);
    }
}