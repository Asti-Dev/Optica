<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'idclientes';
    protected $guarded = [
        'idclientes',
        'created_at',
        'udated_at'
    ];

    public $timestamps = true;

    public static function getFormGuiaCliente($request){

        $request->validate([
            'nombre_apellido' => 'required',
        ]);

        $inputs = $request->all();
        // $check = Cliente::where('nombre_apellido', '=',  $inputs['nombre_apellido'])
        // ->get();

        // if (!isset($check[0])) {
            $cliente =Cliente::firstOrNew(['nombre_apellido' => $inputs['nombre_apellido']]);
            $cliente->nombre_apellido = $inputs['nombre_apellido'];
            $cliente->telefono = $inputs['telefono'];
            $cliente->direccion = $inputs['direccion'];

            $cliente->save();

            $data['idcliente'] = $cliente->idclientes;

            return $data;
        // } else {
        //     $data['cliente'] = $check[0]->attributesToArray();
        //     $data['formInputs'] = $inputs;

        //     return $data;
        // }
    }


    public function guias(){
        return $this->hasMany(Guia::class);
    }
}
