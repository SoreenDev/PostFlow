<?php

namespace App\Repositories\Comment;


use App\Models\Comment;
use App\Repositories\RepositoryInterface;

interface CommentRepositoryInterface extends RepositoryInterface
{
    public function getModel(): Comment ;

}
