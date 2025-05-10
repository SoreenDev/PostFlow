<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreCommentRequest;
use App\Models\Comment;
use App\Services\CommentService;
use Gate;

class CommentController extends Controller
{
    public function __construct(public CommentService $service)
    {}

    /**
     * Store a newly created resource in storage.
     */
    public function relay(StoreCommentRequest $request, Comment $comment)
    {
        $this->service->comment($comment, $request);
        return $this->response(
            message: trans('response.operations.succeeded')
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        Gate::authorize('view',[Comment::class, $comment]);

        $comment = $this->service->view($comment);
        return $this->response(
            data: $comment->toResource(),
            message: trans('response.success.show', ['item' => trans('comment')])
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCommentRequest $request, Comment $comment)
    {
        Gate::authorize('update',[Comment::class, $comment]);

        $comment = $this->service->update($request, $comment);
        return $this->response(
            data: $comment->toResource(),
            message: trans('response.success.update', ['item' => trans('comment')])
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        Gate::authorize('delete',[Comment::class, $comment]);

        $this->service->delete($comment);
        return $this->response(
            message: trans('response.success.deleted', ['item' => trans('comment')])
        );
    }

    public function like(Comment $comment)
    {
        $this->service->like($comment);
        return $this->response(
            message: trans('response.operations.succeeded')
        );
    }
}
