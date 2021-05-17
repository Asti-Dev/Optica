<?php

namespace App\Policies;

use App\Models\Guia;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GuiaPolicy
{
    use HandlesAuthorization;

    public function excel(User $user)
    {
        $permiso = "total_access";
        return $user->hasAccess($permiso);
    }
    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        $permiso = "access_guia";
        return $user->hasAccess($permiso);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Guia  $guia
     * @return mixed
     */
    public function view(User $user, Guia $guia)
    {
        $permiso = "show_guia";
        return $user->hasAccess($permiso);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $permiso = "create_guia";
        return $user->hasAccess($permiso);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Guia  $guia
     * @return mixed
     */
    public function update(User $user, Guia $guia)
    {
        $permiso = "edit_guia";
        return $user->hasAccess($permiso);
    }


    public function anular(User $user)
    {
        $permiso = "delete_guia";
        return $user->hasAccess($permiso);
    }
    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Guia  $guia
     * @return mixed
     */
    public function delete(User $user, Guia $guia)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Guia  $guia
     * @return mixed
     */
    public function restore(User $user, Guia $guia)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Guia  $guia
     * @return mixed
     */
    public function forceDelete(User $user, Guia $guia)
    {
        //
    }
}
