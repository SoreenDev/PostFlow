<?php

namespace App\Services;

use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class Service
{
    protected Repository $repository;
    protected array $relations ;

    protected function viewAny(array $options): Collection|array
    {
         return $this->repository->getWithOptionalRelations($this->relations, $options);
    }

    protected  function create(Request $request)
    {
        return $this->repository->store($request->validate());
    }

    protected  function show(Model $model)
    {
        return $model->load($this->relations);
    }

    protected  function update(Request $request, Model $model)
    {
        return $this->repository->update($model, $request->validate());
    }

    protected  function destroy(Model $model)
    {
        return $model->delete();
    }
}
