<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

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
