<?php

namespace App\Services;

use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class Service
{
    abstract public function __construct();

    protected array $relations ;
    protected Repository $repository ;

    protected function viewAny(array $pagenaite): Collection|array
    {
         return $this->repository->getWithOptionalRelations($this->relations);
    }

    protected  function create(Request $request)
    {
        return $this->repository->store($request->validate());
    }

    protected  function update(Request $request, Model $model)
    {
        return $this->repository->update($model, $request->validate());
    }

}
