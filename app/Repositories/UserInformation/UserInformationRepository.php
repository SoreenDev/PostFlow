<?php

namespace App\Repositories\UserInformation;

use App\Models\UserInformation;
use App\Repositories\Repository;

class UserInformationRepository extends Repository implements UserInformationRepositoryInterface
{
    public function __construct(UserInformation $model)
    {
        parent::__construct($model);
    }
    public function getModel(): UserInformation
    {
        return parent::getModel();
    }


}
