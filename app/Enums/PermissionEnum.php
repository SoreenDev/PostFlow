<?php

namespace App\Enums;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

enum PermissionEnum: string {

    case User = 'user';
    case UserViewAny = 'user.viewAny';
    case UserView    = 'user.view';
    case UserStore   = 'user.store';
    case UserUpdate  = 'user.update';
    case UserDelete = 'user.destroy';

    case PostCategory = 'post.category';
    case PostCategoryViewAny = 'post-category.viewAny';
    case PostCategoryView   = 'post-category.view';
    case PostCategoryStore   = 'post-category.store';
    case PostCategoryUpdate   = 'post-category.update';
    case PostCategoryDelete = 'post-category.destroy';

    case Tag = 'tag';
    case TagViewAny = 'tag.viewAny';
    case TagView   = 'tag.view';
    case TagStore   = 'tag.store';
    case TagUpdate   = 'tag.update';
    case TagDelete   = 'tag.destroy';

    case Post = 'post';
    case PostViewAny = 'post.viewAny';
    case PostView   = 'post.view';
    case PostStore   = 'post.store';
    case PostUpdate   = 'post.update';
    case PostDelete   = 'post.destroy';

    case Comment = 'comment';
    case CommentViewAny = 'comment.viewAny';
    case CommentView   = 'comment.view';
    case CommentStore   = 'comment.store';
     case CommentUpdate   = 'comment.update';
     case CommentDelete   = 'comment.destroy';

     case Dashboard = 'dashboard';

    public static function generatePermissions(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        foreach (PermissionEnum::cases() as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission->value],
                ['name' => $permission->value]
            );
        }
    }
}
