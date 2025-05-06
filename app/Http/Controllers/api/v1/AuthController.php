<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthLoginRequest;
use App\Http\Requests\Auth\AuthRegisterRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    public function __construct(
        public AuthService $authService
    )
    {}

    public function register(AuthRegisterRequest $request)
    {
        $result = $this->authService->ApiRegister($request);
        return $this->Response(...$result,  message: trans('auth.success.register'));
    }

    public function login(AuthLoginRequest $request)
    {
        $result = $this->authService->ApiLogin($request);
        return $this->Response(...$result);
    }

    public function logout()
    {
        $result = $this->authService->ApiLogout();
        return $this->Response(...$result,  message: trans('auth.success.logout'));
    }
}
