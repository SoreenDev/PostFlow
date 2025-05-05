<?php

namespace App\Repositories\Post;


use App\Models\Tag;
use App\Repositories\RepositoryInterface;

interface PostRepositoryInterface extends RepositoryInterface
{
    public function getModel(): Tag ;

}
