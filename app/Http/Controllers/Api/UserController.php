<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\User\StoreUserRequest;
use App\Http\Requests\Api\User\UpdateUserRequest;
use App\Models\User;
use App\Services\Api\UserService;
use Illuminate\Http\JsonResponse as Json;
use Illuminate\Support\Facades\Gate;

class UserController extends BasicController
{
    public function __construct(
        public UserService $service
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index() : Json
    {
        Gate::authorize('view-any', User::class);
        $result = $this->service->viewAny();
        return response()->json(...$result);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request) : Json
    {
        Gate::authorize('create', User::class);
        $result = $this->service->create($request);
        return response()->json(...$result);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) : Json
    {
        Gate::authorize('view', [User::class, $id]);
        $result = $this->service->view($id);
        return response()->json(...$result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id) : Json
    {
        Gate::authorize('update', [User::class, $id]);
        $result = $this->service->edite($id ,$request);
        return response()->json(...$result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : Json
    {
        Gate::authorize('delete', [User::class, $id]);
        $result = $this->service->delete($id);
        return response()->json(...$result);
    }
}
