<?php

namespace App\Services\Api;

use App\Helpers\FileHelper;
use App\Repositories\UserMetaRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Facades\JWTAuth;
use Throwable;
use Arr;

class  AuthService extends BasicService
{
    public function __construct(
        public UserRepository $repository,
        public UserMetaRepository $metaRepository
    )
    {}

    public function register(array $data): array
    {
        try {
            $token = DB::transaction(function () use ($data) {

                $data['profile_path'] = FileHelper::saveFile( $data['profile'] ?? null, 'Profiles' ,false);

                $newUser = $this->repository->create(Arr::only($data, ['email', 'password']));
                $this->metaRepository->create([
                    ... Arr::except($data, ['email', 'password']),
                    'user_id' => $newUser->id,
                ]);

                return  JWTAuth::fromUser($newUser);
            });

            return $this->createResponse(trans('auth.success.register'), 201, [ 'token' => $token]);
        }catch (Throwable  $exception){
            Log::error(trans('auth.error.register') . ' | Exception: ' . $exception->getMessage());
            return $this->createResponse(trans('auth.error.register'), $exception->getCode());
        }
    }

    public function login(array $data): array
    {
        try {
            if (!$token = JWTAuth::attempt($data)) {
                return $this->createResponse(trans('auth.error.login'), 401);
            }
            return $this->createResponse(trans('auth.success.login'), 200, [ 'token' => $token]);
        }catch (Throwable  $exception){
            Log::error(trans('auth.error.failed_login') . ' | Exception: ' . $exception->getMessage());
            return $this->createResponse(trans('auth.error.failed_login'), $exception->getCode());
        }
    }

    public function logout(): array
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());

            return $this->createResponse(trans('auth.success.logout'), 200);
        }catch (Throwable  $exception){
            Log::error(trans('auth.error.logout') . ' | Exception: ' . $exception->getMessage());
            return $this->createResponse(trans('auth.error.logout'), $exception->getCode());
        }
    }
}

