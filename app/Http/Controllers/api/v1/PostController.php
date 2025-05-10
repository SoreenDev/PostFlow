<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexOptionRequest;
use App\Http\Requests\Post\StoreCommentRequest;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use App\Services\PostService;
use Gate;

class PostController extends Controller
{
    public function __construct(
        public PostService $Service
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(IndexOptionRequest $request)
    {
        $result = $this->Service->viewAny($request->validated());
        return $this->ResponseWithAdditional(
            $result->toResourceCollection(),
            message: trans('response.success.index', ['items' => trans('posts') ])
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        Gate::authorize('create',Post::class);

        $result = $this->Service->create($request);
        return $this->response(
            $result->toResource(),
            message: trans('response.success.store', ['item' => trans('post')])
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        Gate::authorize('view',[Post::class, $post]);

        $post = $this->Service->view($post);
        return $this->response(
            $post->toResource(),
            message: trans('response.success.show', ['item' => trans('post')])
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        Gate::authorize('update',[Post::class, $post]);

        $post = $this->Service->update($request, $post);
        return $this->response(
            $post->toResource(),
            message: trans('response.success.update', ['item' => trans('post')])
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete',[Post::class, $post]);

        $this->Service->delete($post);
        return $this->response(
            message: trans('response.success.deleted', ['item' => trans('post')])
        );
    }

    public function dashboardIndex(IndexOptionRequest $request)
    {
        Gate::authorize('dashboard-index',Post::class);
        $result = $this->Service->dashboardViewAny($request->validated());
        return $this->ResponseWithAdditional(
            $result->toResourceCollection(),
            message: trans('response.success.index', ['items' => trans('posts') ])
        );
    }

    public function like(Post $post)
    {
        $this->Service->like($post);

        return $this->Response(
            message: trans('response.operations.succeeded')
        );
    }

    public function comment(Post $post, StoreCommentRequest $request)
    {
        $this->Service->comment($post, $request);

        return $this->response(
            message: trans('response.success.show', ['item' => trans('comment')])
        );
    }
}
