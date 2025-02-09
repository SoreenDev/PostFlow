<?php

namespace App\Services\Api;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use ReflectionClass;
use Throwable;

abstract class BasicService
{

    /**
     * Creates a standard API response.
     *
     * This method returns a structured JSON response, including success status, message, and data.
     * If the data is paginated (`LengthAwarePaginator`), pagination details are also included.
     *
     * @param string|null $message The message to be included in the response (default: `null`).
     * @param int $statusCode The HTTP status code (if invalid, defaults to `500`).
     * @param mixed $data The response data (can be an array, object, or `LengthAwarePaginator`).
     *
     * @return array An array containing:
     *  - `array`: Structured response with `success`, `message`, `data`, and optionally `pagination`.
     *   - `int`: The HTTP status code.
     */
    protected function createResponse (?string $message, int $statusCode, $data = []): array
    {
        $validStatusCodes = [
            200, 201, 202, 204, 400, 401, 403, 404, 422, 429, 500
        ];
        $statusCode = in_array($statusCode, $validStatusCodes) ? $statusCode : 500 ;

        $result = [
            'success' => $statusCode >= 200 && $statusCode < 300,
            'message' => $message ?? trans('auth.non'),
        ];

        if (isset($data->resource) && $data->resource instanceof LengthAwarePaginator) {
            $result = array_merge($result, [
                'data' => $data->items(),
                'pagination' => [
                    'current_page' => $data->currentPage(),
                    'per_page' => $data->perPage(),
                    'total' => $data->total(),
                    'last_page' => $data->lastPage(),
                    'next_page_url' => $data->nextPageUrl(),
                    'prev_page_url' => $data->previousPageUrl(),
                ]
            ]);
        } else {
            $result['data'] = $data;
        }
        return [$result, $statusCode];
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
