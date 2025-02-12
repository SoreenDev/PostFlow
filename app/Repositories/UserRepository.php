<?php

namespace App\Repositories ;

use App\Models\User;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\Permission\Models\Role;

class UserRepository extends BaseRepository
{
    public function model(): string
    {
        return User::class ;
    }

    public function syncRole($id, $roleId): void
    {
        if (is_null($roleId)){
            return ;
        }
        $user = $this->find($id);
        $user->syncRoles(Role::find($roleId));
    }
    public static function hasRole_bol($id): bool
    {
        return User::find($id)->hasRole(Role::pluck('id')->all());
    }
}
