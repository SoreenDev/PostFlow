<?php

namespace App\Services;

use App\Repositories\User\UserRepository;

class UserService extends Service
{
    public function __construct(
        public UserRepository $userRepository
    )
    {
        $this->relations = [];
    }
}
