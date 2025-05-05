<?php

namespace App\Repositories\PostCategory;


use App\Models\PostCategory;
use App\Repositories\RepositoryInterface;

interface PostCategoryRepositoryInterface extends RepositoryInterface
{
    public function getModel(): PostCategory;

}
