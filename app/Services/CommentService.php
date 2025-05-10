<?php

namespace App\Services;

use App\Repositories\Comment\CommentRepositoryInterface;
use App\Traits\HasCommentOrLike;

class CommentService extends Service
{
    use HasCommentOrLike;
    public function __construct(CommentRepositoryInterface $repository)
    {
        parent::__construct($repository);
        $this->relations = ['likes', 'user', 'comments'];
    }
}
