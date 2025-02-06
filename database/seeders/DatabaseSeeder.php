<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private array $seedersCall = [
        PermissionSeeder::class,
        RoleSeeder::class,
    ];
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call($this->seedersCall);
    }
}
