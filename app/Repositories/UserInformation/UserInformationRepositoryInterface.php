<?php

namespace App\Repositories\UserInformation;


use App\Models\UserInformation;
use App\Repositories\RepositoryInterface;

interface UserInformationRepositoryInterface extends RepositoryInterface
{
    public function getModel(): UserInformation ;

}
