<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    function response($data = [], $message = "", $statusCode = 200, bool $success = true ): JsonResponse
    {
        return response()->json(
            compact('success', 'data', 'message'),
            $statusCode
        );
    }

    function responseWithAdditional($data = [], string $message = null, $status = 200, $additional = []): JsonResponse
    {
        return $data->additional(array_merge([
            'success' => true,
            'message' => $message ?? ''
        ], $additional))->response()->setStatusCode($status);
    }
}
