<?php

namespace App\Services\Api;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Cache;
use ReflectionClass;
use Throwable;

abstract class BasicService
{
    protected function createResponse (?string $message, int $statusCode, $data = []): array
    {
        $validStatusCodes = [
            200, 201, 202, 204, 400, 401, 403, 404, 422, 429, 500
        ];

        return [
            $message ?? trans('auth.non'),
            in_array($statusCode, $validStatusCodes) ? $statusCode : 500,
            $data
        ];
    }

    /**
        * This method extracts the relationships of a given model.
        * It uses Reflection to inspect the public methods of the model and checks if the return type is an Eloquent relation.
        *
        * Caching is used to store the relationships for faster access. The cache key is based on the model's class name.
        * If relationships are already cached, they will be returned from the cache. Otherwise, they will be calculated and stored.
        *
        * After retrieving the relationships, it applies a filter to remove any disallowed relationships if a filter is provided.
        * If no filter is given, the default disallowed relationships are applied.
     */

    function getModelRelations(Model $model, array $filter = []): array
    {
        $cacheKey = 'model_relations_' . get_class($model);

        $result =  Cache::rememberForever($cacheKey, function () use ($model) {
            $relations = [];

            $class = new ReflectionClass($model);

            foreach ($class->getMethods() as $method) {
                if ($method->class === get_class($model) && $method->isPublic() && $method->getNumberOfParameters() === 0) {
                    try {
                        $returnType = $method->invoke($model);
                        if ($returnType instanceof Relation) {
                            $relations[] = $method->name;
                        }
                    } catch (Throwable $e) {
                    }
                }
            }
            return $relations;
        });
        return $this->filterInvalidRelations(relations: $result, disallowedRelations: $filter);
    }

    private function filterInvalidRelations(array $relations, array $disallowedRelations = null): array
    {
        $defaultDisallowedRelations = [
            "notifications",
            "readNotifications",
            "unreadNotifications",
            "tokens",
        ];

        if ($disallowedRelations === null) {
            $disallowedRelations = $defaultDisallowedRelations;
        } else {
            $disallowedRelations = array_merge($defaultDisallowedRelations, $disallowedRelations);
        }

        $filteredRelations = array_filter($relations, function ($relation) use ($disallowedRelations) {
            return !in_array($relation, $disallowedRelations);
        });

        return array_values($filteredRelations);
    }

}
