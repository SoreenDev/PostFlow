<?php

namespace App\Repositories\PostCategory;

use App\Models\PostCategory;
use App\Repositories\Repository;

class PostCategoryRepository extends Repository implements PostCategoryRepositoryInterface
{
    public function __construct(PostCategory $model)
    {
        parent::__construct($model);
    }
    public function getModel(): PostCategory
    {
        return parent::getModel();
    }

}
