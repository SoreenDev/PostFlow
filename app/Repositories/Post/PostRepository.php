<?php

namespace App\Repositories\Post;

use App\Models\Post;
use App\Repositories\Repository;

class PostRepository extends Repository implements PostRepositoryInterface
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }
    public function getModel(): Post
    {
        return parent::getModel();
    }


}
