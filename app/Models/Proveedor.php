<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedores';
    protected $primaryKey = 'idproveedores';
    protected $guarded = [
        'idproveedores',
        'created_at',
        'udated_at'
    ];

    public $timestamps = true;

    public function marcas()
    {
        return $this->belongsToMany(Marca::class, 'marca_proveedor', 'idproveedores','idmarcas');
    }

    public function producto()
    {
    return $this->hasOne(Producto::class, 'idproveedores', 'idproveedores');
    }
}
