<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Services\Api\AuthService;

class AuthController extends BasicController
{
    public function __construct(
        public AuthService $service
    )
    {}

    public function register(RegisterRequest $request)
    {
        $result = $this->service->register($request->validated());
        return $this->jsonResponse(...$result);
    }
    public function login(LoginRequest $request)
    {
        $result = $this->service->login($request->validated());
        return $this->jsonResponse(...$result);
    }
    public function logout()
    {
        $result = $this->service->logout();
        return $this->jsonResponse(...$result);
    }
}
