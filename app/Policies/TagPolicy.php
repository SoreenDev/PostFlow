<?php

namespace App\Policies;

use App\Enums\PermissionEnum;
use App\Models\Tag;
use App\Models\User;

class TagPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo(PermissionEnum::TagViewAny);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Tag $tag): bool
    {
        return $user->hasPermissionTo(PermissionEnum::TagView);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo(PermissionEnum::TagStore);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Tag $tag): bool
    {
        return $user->hasPermissionTo(PermissionEnum::TagUpdate);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Tag $tag): bool
    {
        return $user->hasPermissionTo(PermissionEnum::TagDelete);
    }
}
