<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Guia;
use App\Models\Marca;
use App\Models\Permission;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Cliente::factory(10)->create();
        Guia::factory(10)->create();
        Marca::factory(10)->create();
        Proveedor::factory(10)->create();

        foreach (Proveedor::all() as $proveedor) {
                $marcas = Marca::inRandomOrder()->take(rand(1, 7))->get();
                foreach ($marcas as $marca) {
                    $proveedor->marcas()->attach($marca->idmarcas);
                }
            }

        // Producto::factory(10)->create();


        // foreach (Guia::all() as $guia) {
        //     $productos = Producto::inRandomOrder()->take(rand(1, 3))->get();
        //     foreach ($productos as $producto) {
        //         $guia->productos()->attach($producto->idproductos, [
        //             'cantidad' => $cantidad = $faker->randomNumber($nbDigits = 1, $strict = true),
        //             'precio' => $cantidad * $producto->precio_unitario,
        //         ]);
        //     }
        // }

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
            [
                'idpermissions'    => '12',
                'permiso' => 'create_proveedor',
            ],
            [
                'idpermissions'    => '13',
                'permiso' => 'edit_proveedor',
            ],
            [
                'idpermissions'    => '14',
                'permiso' => 'show_proveedor',
            ],
            [
                'idpermissions'    => '15',
                'permiso' => 'delete_proveedor',
            ],
            [
                'idpermissions'    => '16',
                'permiso' => 'access_proveedor',
            ],
            [
                'idpermissions'    => '17',
                'permiso' => 'create_marca',
            ],
            [
                'idpermissions'    => '18',
                'permiso' => 'edit_marca',
            ],
            [
                'idpermissions'    => '19',
                'permiso' => 'show_marca',
            ],
            [
                'idpermissions'    => '20',
                'permiso' => 'delete_marca',
            ],
            [
                'idpermissions'    => '21',
                'permiso' => 'access_marca',
            ],
        ];

        Permission::insert($permissions);

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

        foreach (Role::all() as $rol){
            foreach(Permission::all()->pluck('idpermissions') as $permission){
                $rol->permissions()->attach($permission);
            }
        }

        $clienteNulo = Cliente::create([
            'nombre_apellido' => '-',
            'telefono' => '-',
            'direccion' => '-'
        ]);
        $clienteNulo->save();

        $user = User::create([
            'username' => 'Admin' ,
            'password' => Hash::make('administrador1'),
        ]);
        $rol = Role::where("rol","=", 'admin')->first();

        $user->roles()->attach($rol->idroles);
        $user->save();
    }
}
