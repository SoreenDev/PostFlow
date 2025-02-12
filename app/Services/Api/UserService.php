<?php

namespace App\Services\Api;

use App\Helpers\FileHelper;
use App\Http\Requests\Api\User\StoreUserRequest;
use App\Http\Requests\Api\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Repositories\UserMetaRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class UserService extends  BasicService
{
    public function __construct(
        public UserRepository $repository,
        public UserMetaRepository $meta_repository
    )
    {}

    public function viewAny(): array
    {
        try {
            $users = $this->repository->with($this->getModelRelations($this->repository->getModel(), filter: ['permissions'] ))->paginate(10);
            $users = UserResource::collection($users);

            return $this->createResponse(trans('response.success.index', ['items' => 'Users']), 200, $users);
        }catch (Throwable  $exception){
            Log::error(trans('response.error.index', ['items' => 'Users']) . ' | Exception: ' . $exception->getMessage());
            return $this->createResponse(null, $exception->getCode());
        }
    }

    public function create(StoreUserRequest $request): array
    {
        try {
            $user = DB::transaction(function () use ($request){

                $user = $this->repository->create($request->only(['email', 'password']));
                $this->meta_repository->create([
                    ...$request->except(['email', 'password', 'profile_path', 'role_id']),
                    'profile_path' =>  FileHelper::saveFile($request->profile_path ?? null, 'Profiles', null),
                    'user_id' => $user->id
                ]);

                $this->repository->syncRole($user->id ?? null ,$request->role_id ?? null);
                return UserResource::make($user->load($this->getModelRelations($this->repository->getModel())));
            });

            return $this->createResponse(trans('response.success.store', ['item' => 'User']), 201, $user);
        }catch (Throwable  $exception){
            Log::error(trans('response.error.store', ['item' => 'User']) . ' | Exception: ' . $exception->getMessage());
            return $this->createResponse(trans('response.error.store', ['item' => 'User']), $exception->getCode());
        }
    }

    public function view(string $id): array
    {
        try {
            $user = $this->repository->with($this->getModelRelations($this->repository->getModel(), filter: ['permissions'] ))->find($id);
            $user = UserResource::make($user);

            return $this->createResponse(trans('response.success.show', ['item' => 'User']), 200, $user);
        }catch (ModelNotFoundException  $exception){
            return $this->createResponse(trans('response.status.404', ['item' => 'User']), 404);
        }catch (Throwable  $exception){
            Log::error(trans('response.error.show', ['item' => 'User']) . ' | Exception: ' . $exception->getMessage());
            return $this->createResponse(trans('response.error.show', ['item' => 'User']), $exception->getCode());
        }
    }

    public function edite(string $id, UpdateUserRequest $request): array
    {
        try {
            $user = DB::transaction(function () use ($request, $id){

                $user = $this->repository->update($request->only(['email', 'password']), $id);
                FileHelper::deleteFile($user->meta()->profile_path ?? '');

               $this->meta_repository->updateOrCreate(
                    [
                        'user_id' => $user->id
                    ],[
                        ...$request->except(['email', 'password', 'profile_path', 'role_id']),
                        'profile_path' =>  FileHelper::saveFile($request->profile_path ?? null, 'Profiles', null)
                    ]
               );

                $this->repository->syncRole($user->id ?? null ,$request->role_id ?? null);
                return UserResource::make($user->load($this->getModelRelations($this->repository->getModel())));
            });

            return $this->createResponse(trans('response.success.update', ['item' => 'User']), 200, $user);
        }catch (ModelNotFoundException  $exception){
            return $this->createResponse(trans('response.status.404', ['item' => 'User']), 404);
        }catch (Throwable  $exception){
            Log::error(trans('response.error.update', ['item' => 'User']) . ' | Exception: ' . $exception->getMessage());
            return $this->createResponse(trans('response.error.update', ['item' => 'User']), $exception->getCode());
        }
    }

    public function delete(string $id): array
    {
        try {
            DB::transaction(function () use ($id){
                FileHelper::deleteFile(UserMetaRepository::findByUserId($id)->profile_path ?? '');
                $this->repository->delete($id);
            });

            return $this->createResponse(trans('response.success.deleted', ['item' => 'User']), 200);
        }catch (ModelNotFoundException  $exception){
            return $this->createResponse(trans('response.status.404', ['item' => 'User']), 404);
        }catch (Throwable  $exception){
            Log::error(trans('response.error.deleted', ['item' => 'User']) . ' | Exception: ' . $exception->getMessage());
            return $this->createResponse(trans('response.error.deleted', ['item' => 'User']), $exception->getCode());
        }
    }

}
