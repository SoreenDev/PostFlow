<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use Spatie\QueryBuilder\QueryBuilder;

class Repository implements RepositoryInterface
{

    public function __construct(public Model $model)
    {
    }

    public function query(array $payload = []): Builder|QueryBuilder
    {
        return $this->model->query();
    }

    public function get(array $payload = []): Collection|array
    {
        return $this->query($payload)->get();
    }

    public function paginate($limit = null, array $payload = []): LengthAwarePaginator|Collection
    {
        if (empty($limit)) {
            $limit = request('limit', 15);
        }
        if ($limit === -1) {
            return $this->get($payload);
        }
        return $this->query($payload)->paginate($limit);
    }

    public function store(array $payload)
    {
        return $this->model->create($payload);
    }

    public function update($eloquent, array $payload)
    {

        $eloquent->update($payload);
        return $eloquent;
    }

    public function delete($eloquent): bool
    {
        return $eloquent->delete();
    }

    public function find(mixed $value, string $field = 'id', array $selected = ['*'], bool $firstOrFail = false, array $with = []): Model|Builder|null
    {
        $model = $this->getModel()->with($with)->select($selected)->where($field, $value);


        if ($firstOrFail) {
            return $model->firstOrFail();
        }

        return $model->first();
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function toggle($model, string $field = 'published')
    {
        $model[$field] = !$model[$field];
        $model->save();
        return $model;
    }

    public function updateOrCreate(array $data, array $conditions = [])
    {
        return $this->model->updateOrCreate($data, $conditions);
    }

    public function data(array $payload = []): array
    {
        return [];
    }

    /**
     * @throws \Exception
     */
    public function getWithOptionalRelations(?array $relations, array $option)
    {
        if (isset($option['columns']) && $option['columns'] !== ['*']) {

            $invalidColumns = array_diff($option['columns'],$this->model->getFillable());
            if (!empty($invalidColumns)) {
                throw ValidationException::withMessages([
                    trans('validation.custom.column-not-found')
                    . implode(', ', $invalidColumns)
                ]);
            }
        }
        return QueryBuilder::for($this->model->newQuery())
            ->allowedIncludes($relations ?? [])
            ->paginate(
                perPage: $option['perPage'] ?? 10,
                columns: $option ['columns'] ?? ['*'],
                page: $option['page'] ?? 1
            );
    }
}
