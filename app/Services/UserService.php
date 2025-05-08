<?php

namespace App\Services;

use App\Repositories\User\UserRepositoryInterface;
use App\Traits\UploadFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserService extends Service
{
    use UploadFile;
    public function __construct(UserRepositoryInterface $repository)
    {
        parent::__construct($repository);
        $this->relations = ['information', 'roles.permissions'];
    }

    public function create(Request $request) :Model
    {
         return DB::transaction(function () use ($request) {
            $user = $this->repository->store($request->validated());
            return $this->handleUserRolesAndInformationAndProfile($request, $user);
        });
    }

    public function update(Request $request, Model $model) :Model
    {
        return DB::transaction(function () use ($request, $model) {
           $this->repository->update($model, $request->validated());
            return $this->handleUserRolesAndInformationAndProfile($request, $model);
        });
    }

    public function delete(Model $model)
    {
        $model->clearMediaCollection('profile');
        $this->repository->delete($model);
    }
    private function handleUserRolesAndInformationAndProfile(Request $request, Model $user): Model
    {
        $request->whenFilled('role', fn() => $user->syncRoles($request->role));
        $request->whenHas('profile', fn() =>$this->uploadToOne($user, 'profile', 'profile'));
        $request->whenFilled('information', fn() => $user->information()->updateOrCreate([], $request->information));
        return $user->load($this->relations);

    }
}
