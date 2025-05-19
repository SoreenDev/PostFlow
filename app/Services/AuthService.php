<?php

namespace App\Services;

use App\Http\Requests\Auth\AuthLoginRequest;
use App\Http\Requests\Auth\AuthRegisterRequest;
use App\Http\Resources\UserResource;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthService
{
    public function __construct(
        public UserRepository $userRepository
    )
    {}

    public function ApiRegister(AuthRegisterRequest $request): array
    {
        return DB::transaction(function () use ($request) {
            $user = $this->userRepository->store($request->validated());
            $token = $user->createToken('token')->plainTextToken;
            return [
                'success' => true,
                'data' => [
                    'user' => UserResource::make($user),
                    'token' => $token,
                ]
            ];
        });
    }

    public function ApiLogin(AuthLoginRequest $request): array
    {
        if (! Auth::attempt($request->validated())){
            return [
                'success' => false,
                'message' => trans('auth.failed'),
                'statusCode'  => 422
            ];
        }
        return DB::transaction(function (){
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;

            return [
                'success' => true,
                'data' => [
                    'token' => $token,
                ],
                'message' => trans('auth.success.login')
            ];
        });
    }
    public function ApiLogout(): array
    {
        Auth::user()->currentAccessToken()->delete();
        return ['success' => true];
    }

    public function register(AuthRegisterRequest $request): array
    {
        return DB::transaction(function () use ($request) {
            $user = $this->userRepository->store($request->validated());
            Auth::login($user);
        });
    }
}
