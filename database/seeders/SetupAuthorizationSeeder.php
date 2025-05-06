<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class SetupAuthorizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PermissionEnum::generatePermissions();
        RoleEnum::generateRoleAndAssignPermission();

        User::firstOrCreate(
            [
                'user_name' => 'soreendev',
                'email' => 'soreendev@gmail.com',
            ],
            [
                'user_name' => 'soreendev',
                'email' => 'soreendev@gmail.com',
                'password' => 'soreendev',
            ]
        )->syncRoles([RoleEnum::SuperADMIN->value]);

    }
}
