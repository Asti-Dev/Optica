<?php

namespace Database\Seeders;

use App\Models\Guia;
use App\Models\Permission;
use App\Models\Producto;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Role::all() as $rol){
            foreach(Permission::all()->pluck('idpermissions') as $permission){
                $rol->permissions()->attach($permission);
            }
        }
    }
}
