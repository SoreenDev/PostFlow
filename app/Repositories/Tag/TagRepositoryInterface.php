<?php

namespace App\Repositories\Tag;


use App\Models\Tag;
use App\Repositories\RepositoryInterface;

interface TagRepositoryInterface extends RepositoryInterface
{
    public function getModel(): Tag ;

}
