<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $primaryKey = 'idpermissions';

    protected $fillable = [
        'permiso'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permission_role', 'idpermissions','idroles');
    }
}
