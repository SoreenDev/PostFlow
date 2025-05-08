<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexOptionRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct(
        public UserService $Service
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(IndexOptionRequest $request)
    {
        Gate::authorize('viewAny',User::class);

        $result = $this->Service->viewAny($request->validated());
        return $this->ResponseWithAdditional(
            $result->toResourceCollection(),
            message: trans('response.success.index', ['items' => trans('users') ])
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        Gate::authorize('create',User::class);

        $result = $this->Service->create($request);
        return $this->response(
            $result->toResource(),
            message: trans('response.success.store', ['item' => trans('user')])
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        Gate::authorize('view',[User::class, $user]);

        $user = $this->Service->view($user);
        return $this->response(
           $user->toResource(),
            message: trans('response.success.show', ['item' => trans('user')])
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        Gate::authorize('update',[User::class, $user]);

        $user = $this->Service->update($request, $user);
        return $this->response(
            $user->toResource(),
            message: trans('response.success.update', ['item' => trans('user')])
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Gate::authorize('delete',[User::class, $user]);

        $this->Service->delete($user);
        return $this->response(
            message: trans('response.success.deleted', ['item' => trans('user')])
        );
    }
}
