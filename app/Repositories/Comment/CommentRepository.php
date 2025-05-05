<?php

namespace App\Repositories\Comment;

use App\Models\Comment;
use App\Repositories\Repository;

class CommentRepository extends Repository implements CommentRepositoryInterface
{
    public function __construct(Comment $model)
    {
        parent::__construct($model);
    }
    public function getModel(): Comment
    {
        return parent::getModel();
    }


}
