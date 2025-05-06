<?php

namespace App\Enums;

use Spatie\Permission\Models\Role;

enum RoleEnum: string implements Enum
{
    case SuperADMIN = 'super-admin';
    case ADMIN = 'admin';
    case Writer  = 'writer';

    public function title():string
    {
        return match ($this) {
            self::SuperADMIN => trans('super-admin'),
            self::ADMIN => trans('admin'),
            self::Writer => trans('writer'),
        };
    }

    public static function generateRoleAndAssignPermission(): void
    {
        Role::firstOrCreate(['name' => self::SuperADMIN->value],['name' => self::SuperADMIN->value])
        ->syncPermissions(PermissionEnum::cases());
        Role::firstOrCreate(['name' => self::ADMIN->value],['name' => self::ADMIN->value])
        ->syncPermissions([
            PermissionEnum::Dashboard->value,

            PermissionEnum::User->value,
            PermissionEnum::UserViewAny->value,
            PermissionEnum::UserView->value,
            PermissionEnum::UserUpdate->value,

            PermissionEnum::Post->value,
            PermissionEnum::PostViewAny->value,
            PermissionEnum::PostView->value,
            PermissionEnum::PostStore->value,
            PermissionEnum::PostUpdate->value,
            PermissionEnum::PostDelete->value,

        ]);
        Role::firstOrCreate(['name' => self::Writer->value],['name' => self::Writer->value])
        ->syncPermissions([
            PermissionEnum::Dashboard->value,

            PermissionEnum::Post->value,
            PermissionEnum::PostViewAny->value,
            PermissionEnum::PostView->value,
            PermissionEnum::PostStore->value,
            PermissionEnum::PostUpdate->value,
            PermissionEnum::PostDelete->value,
        ]);
    }
}
