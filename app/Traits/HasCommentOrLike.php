<?php

namespace App\Traits;

use App\Http\Requests\Post\StoreCommentRequest;
use DB;
use Illuminate\Database\Eloquent\Model;

trait HasCommentOrLike
{
    public function like(Model $model): void
    {
        DB::transaction(function () use($model){
            $user = auth()->user();
            $like = $model->likes->firstWhere('user_id', $user->id);
            if (isset($like)){
                $like->delete();
            }else{
                $model->likes()->create(['user_id' => $user->id]);
            }
        });
    }

    public function comment(model $model, StoreCommentRequest $request): void
    {
        $model->comments()->create(['user_id' => auth()->id(), 'content' => $request->content]);
    }
}
