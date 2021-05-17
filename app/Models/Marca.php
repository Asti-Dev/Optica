<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $table = 'marcas';
    protected $primaryKey = 'idmarcas';
    protected $guarded = [
        'idmarcas',
        'created_at',
        'udated_at'
    ];

    public $timestamps = true;

    public function proveedores()
    {
        return $this->belongsToMany(Proveedor::class, 'marca_proveedor', 'idproveedores','idmarcas');
    }

    public function producto()
    {
    return $this->hasOne(Marca::class, 'idmarcas', 'idmarcas');
    }

}
