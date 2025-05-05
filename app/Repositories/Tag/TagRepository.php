<?php

namespace App\Repositories\Tag;

use App\Models\Tag;
use App\Repositories\Repository;

class TagRepository extends Repository implements TagRepositoryInterface
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }
    public function getModel(): Tag
    {
        return parent::getModel();
    }


}
