<?php

namespace App\Repositories ;

use App\Models\UserMeta;
use Prettus\Repository\Eloquent\BaseRepository;

class UserMetaRepository extends BaseRepository
{

    public function model(): string
    {
        return UserMeta::class;
    }

    public static function findByUserId(string $userId): UserMeta
    {
        return UserMeta::where('user_id',$userId)->first();
    }

}
