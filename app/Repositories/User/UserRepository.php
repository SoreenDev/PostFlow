<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\Repository;

class UserRepository extends Repository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    public function getModel(): User
    {
        return parent::getModel();
    }
}
