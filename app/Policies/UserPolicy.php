<?php

namespace App\Policies;

use App\Enums\PermissionEnum;
use App\Models\User;
use App\Repositories\UserRepository;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo(PermissionEnum::UserIndex);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, string $id): bool
    {
        return $user->hasPermissionTo(PermissionEnum::UserShow) || $user->id == $id ;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo(PermissionEnum::UserStore) ;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, string $id): bool
    {
        return ($user->hasPermissionTo(PermissionEnum::UserUpdate) && ! UserRepository::hasRole_bol($id) ) || $user->id == $id ;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, string $id): bool
    {
        return $user->hasPermissionTo(PermissionEnum::UserDelete) && $user->id !== $id ;
    }
}
