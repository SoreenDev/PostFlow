<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Models\UserInformation;
use App\Repositories\RepositoryInterface;

Interface UserRepositoryInterface extends RepositoryInterface
{
    public function getModel(): User;

    public function setInformation(): UserInformation;
}
