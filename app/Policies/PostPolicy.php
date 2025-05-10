<?php

namespace App\Policies;

use App\Enums\PermissionEnum;
use App\Enums\PostStatusEnum;
use App\Models\Post;
use App\Models\User;

class PostPolicy
{

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        return match (true){
            $user->hasPermissionTo(PermissionEnum::PostView) => true,
            $post->status == PostStatusEnum::Published->value => true,
            $post->author_id = $user->id => true,
            default => false
        };
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo(PermissionEnum::PostStore);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        return match (true){
            $user->hasPermissionTo(PermissionEnum::PostUpdate) => true,
            $post->author_id = $user->id && $post->status !== PostStatusEnum::Published => true,
            default => false
        };
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        return match (true){
            $user->hasPermissionTo(PermissionEnum::PostDelete) => true,
            $post->author_id = $user->id && $post->status == PostStatusEnum::Draft => true,
            default => false
        };
    }
}
