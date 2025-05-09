<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexOptionRequest;
use App\Http\Requests\PostCategory\StorePostCategoryRequest;
use App\Http\Requests\PostCategory\UpdatePostCategoryRequest;
use App\Models\PostCategory;
use App\Services\PostCategoryService;
use Gate;

class PostCategoryController extends Controller
{
    public function __construct(
        public PostCategoryService $Service
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(IndexOptionRequest $request)
    {
        Gate::authorize('viewAny',PostCategory::class);

        $result = $this->Service->viewAny($request->validated());
        return $this->ResponseWithAdditional(
            $result->toResourceCollection(),
            message: trans('response.success.index', ['items' => trans('Post Categories') ])
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostCategoryRequest $request)
    {
        Gate::authorize('create',PostCategory::class);

        $result = $this->Service->create($request);
        return $this->response(
            $result->toResource(),
            message: trans('response.success.store', ['item' => trans('Post Category')])
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PostCategory $post_category)
    {
        Gate::authorize('view',[PostCategory::class, $post_category]);

        $post_category = $this->Service->view($post_category);
        return $this->response(
            $post_category->toResource(),
            message: trans('response.success.show', ['item' => trans('Post Category')])
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostCategoryRequest $request, PostCategory $post_category)
    {
        Gate::authorize('update',[PostCategory::class, $post_category]);

        $post_category = $this->Service->update($request, $post_category);
        return $this->response(
            $post_category->toResource(),
            message: trans('response.success.update', ['item' => trans('Post Category')])
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostCategory $post_category)
    {
        Gate::authorize('delete',[PostCategory::class, $post_category]);

        $this->Service->delete($post_category);
        return $this->response(
            message: trans('response.success.deleted', ['item' => trans('Post Category')])
        );
    }
}
