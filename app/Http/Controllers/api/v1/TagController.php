<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexOptionRequest;
use App\Http\Requests\Tag\StoreTagRequest;
use App\Http\Requests\Tag\UpdateTagRequest;
use App\Models\Tag;
use App\Services\TagService;
use Gate;

class TagController extends Controller
{
    public function __construct(
        public TagService $Service
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(IndexOptionRequest $request)
    {
        Gate::authorize('viewAny',Tag::class);
        $result = $this->Service->viewAny($request->validated());
        return $this->ResponseWithAdditional(
            $result->toResourceCollection(),
            message: trans('response.success.index', ['items' => trans('Tag') ])
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        Gate::authorize('create',Tag::class);

        $result = $this->Service->create($request);
        return $this->response(
            $result->toResource(),
            message: trans('response.success.store', ['item' => trans('Tag')])
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        Gate::authorize('view',[Tag::class, $tag]);

        $tag = $this->Service->view($tag);
        return $this->response(
            $tag->toResource(),
            message: trans('response.success.show', ['item' => trans('Tag')])
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        Gate::authorize('update',[Tag::class, $tag]);

        $tag = $this->Service->update($request, $tag);
        return $this->response(
            $tag->toResource(),
            message: trans('response.success.update', ['item' => trans('Tag')])
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        Gate::authorize('delete',[Tag::class, $tag]);

        $this->Service->delete($tag);
        return $this->response(
            message: trans('response.success.deleted', ['item' => trans('Tag')])
        );
    }
}
