<?php

namespace App\Services;

use App\Repositories\PostCategory\PostCategoryRepositoryInterface;

class PostCategoryService extends Service
{
    public function __construct(PostCategoryRepositoryInterface $repository)
    {
        parent::__construct($repository);
        $this->relations = ['posts'];
    }
}
