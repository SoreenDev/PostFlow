<?php

namespace App\Repositories\Post;


use App\Models\Post;
use App\Repositories\RepositoryInterface;

interface PostRepositoryInterface extends RepositoryInterface
{
    public function getModel(): Post ;

}
