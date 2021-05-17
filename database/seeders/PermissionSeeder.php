<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'idpermissions'    => '1',
                'permiso' => 'total_access',
            ],
            [
                'idpermissions'    => '2',
                'permiso' => 'create_guia',
            ],
            [
                'idpermissions'    => '3',
                'permiso' => 'edit_guia',
            ],
            [
                'idpermissions'    => '4',
                'permiso' => 'show_guia',
            ],
            [
                'idpermissions'    => '5',
                'permiso' => 'delete_guia',
            ],
            [
                'idpermissions'    => '6',
                'permiso' => 'access_guia',
            ],
            [
                'idpermissions'    => '7',
                'permiso' => 'create_producto',
            ],
            [
                'idpermissions'    => '8',
                'permiso' => 'edit_producto',
            ],
            [
                'idpermissions'    => '9',
                'permiso' => 'show_producto',
            ],
            [
                'idpermissions'    => '10',
                'permiso' => 'delete_producto',
            ],
            [
                'idpermissions'    => '11',
                'permiso' => 'access_producto',
            ],
        ];

        Permission::insert($permissions);
    }
}
