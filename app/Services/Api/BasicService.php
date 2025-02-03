<?php

namespace App\Services\Api;


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
}
