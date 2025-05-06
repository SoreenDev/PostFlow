<?php

namespace App\Services;

use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class Service
{
    public Repository $repository;
    public array $relations ;

    public function viewAny(array $options): Collection|array
    {
         return $this->repository->getWithOptionalRelations($this->relations, $options);
    }

    public function create(Request $request)
    {
        return $this->repository->store($request->validated());
    }

    public function show(Model $model)
    {
        return $model->load($this->relations);
    }

    public function update(Request $request, Model $model)
    {
        return $this->repository->update($model, $request->validated());
    }

    public function destroy(Model $model)
    {
        return $model->delete();
    }
}
