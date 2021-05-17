<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $primaryKey = "idroles";
    protected $fillable = [
        'rol'
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'permission_role','idroles', 'idpermissions');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'idroles','user_id');
    }

    public function hasPermiso($permiso){
        foreach($this->permissions as $permission)
        if($permission->permiso == $permiso){
            return true;
        break;
        }
        return false;
    }
}
