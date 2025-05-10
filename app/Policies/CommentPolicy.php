<?php

namespace App\Policies;

use App\Enums\PermissionEnum;
use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Comment $comment): bool
    {
        return $user->hasPermissionTo(PermissionEnum::CommentView);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Comment $comment): bool
    {
        return $user->hasPermissionTo(PermissionEnum::CommentUpdate);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Comment $comment): bool
    {
        return $user->hasPermissionTo(PermissionEnum::CommentDelete);
    }
}
