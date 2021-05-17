<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
            [
                'idroles'    => 1,
                'rol' => 'admin',
            ],
            [
                'idroles'    => 2,
                'rol' => 'vendedor',
            ],
            [
                'idroles'    => 3,
                'rol' => 'almacen',
            ],
        ];

        Role::insert($roles);


    }
}
