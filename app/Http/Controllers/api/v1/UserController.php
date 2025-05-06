<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexOptionRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        public UserService $Service
        # todo add authorize
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(IndexOptionRequest $request)
    {
        $result = $this->Service->viewAny($request->validated());
        $this->ResponseWithAdditional(
            UserResource::collection($result),
            message: trans('responce.success.index', ['items' => trans('users') ])
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
