<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::firstOrCreate([
            'name' => 'Manager',
            'guard_name' => 'api'
        ])->syncPermissions(PermissionEnum::cases());

        User::firstOrCreate([
            'email' => 'soreendev@gmail.com',
        ],[
            'email' => 'soreendev@gmail.com',
            'password' => 'Admin@1221',

        ])->assignRole($role);

        Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'api'
        ],[
            'name' => 'admin',
            'guard_name' => 'api'
        ])->syncPermissions([
            PermissionEnum::UserIndex->value,
            PermissionEnum::UserShow->value,
            PermissionEnum::UserUpdate->value,
        ]);

    }
}
