<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class BasicController extends Controller
{
    function jsonResponse(string $message, int $statusCode, $data = []): JsonResponse
    {
        return response()->json(
                [
                    'success' => $statusCode >= 200 && $statusCode < 300,
                    'message' => $message,
                    'data' =>  $data
                ],
            $statusCode
        );
    }
}
