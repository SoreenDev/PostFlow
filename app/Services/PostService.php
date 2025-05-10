<?php

namespace App\Services;

use App\Repositories\Post\PostRepositoryInterface;

class PostService extends Service
{
    public function __construct(PostRepositoryInterface $repository)
    {
        parent::__construct($repository);
        $this->relations = ['posts'];
    }



}
