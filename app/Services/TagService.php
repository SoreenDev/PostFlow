<?php

namespace App\Services;

use App\Repositories\Tag\TagRepositoryInterface;

class TagService extends Service
{
    public function __construct(TagRepositoryInterface $repository)
    {
        parent::__construct($repository);
        $this->relations = ['posts'];
    }
}
