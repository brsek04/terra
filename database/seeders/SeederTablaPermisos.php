<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;


class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            'ver-plato',
            'ver-bebestibles',
            'ver-compañias',
            'ver-menu',
            'ver-ramas',
        ];

        foreach ($permisos as $permiso) {
            Permission::updateOrCreate(['name' => $permiso], ['guard_name' => 'web']);
        }


        //
    }
}
