<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    const SIACABADO = 1;
    const NOACABADO = 0;


    protected $table = 'productos';
    protected $primaryKey = 'idproductos';

    protected $guarded = [
        'idproductos',
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function proveedor()
    {
        return $this->belongsTo('App\Models\Proveedor', 'idproveedores', 'idproveedores');
    }

    public function marca()
    {
        return $this->belongsTo('App\Models\Marca', 'idmarcas', 'idmarcas');
    }


}
