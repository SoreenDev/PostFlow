<?php

namespace App\Services;

use App\Enums\PostStatusEnum;
use App\Models\Post;
use App\Repositories\Post\PostRepositoryInterface;
use App\Traits\HasCommentOrLike;
use App\Traits\UploadFile;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\QueryBuilder;

class PostService extends Service
{
    use UploadFile, HasCommentOrLike;
    public function __construct(PostRepositoryInterface $repository)
    {
        parent::__construct($repository);
        $this->relations = ['author', 'category', 'tags', 'likes', 'comments'];
    }

    public function viewAny(array $options)
    {
       return QueryBuilder::for(Post::class)
            ->where('status',PostStatusEnum::Published->value)
            ->allowedIncludes($relations ?? [])
            ->paginate(
                perPage: $option['perPage'] ?? 10,
                columns: $option ['columns'] ?? ['*'],
                page: $option['page'] ?? 1
            );
    }

    public function create(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $model = $this->repository->store([
                ...$request->validated(),
                'author_id' => auth()->id(),
                'status' => $request->status ?? 0,
                'slug' => Str::slug($request->title)
            ]);
           $this->addImagesAndTags($request, $model);
           return $model->load($this->relations);
        });
    }

    public function update(Request $request, Model $model)
    {
        return DB::transaction(function () use ($request, $model) {
            $this->repository->update( $model,
                [
                ...$request->validated(),
                'author_id' => auth()->id(),
                'status' => $request->status ?? 0,
                'slug' => Str::slug($request->title ?? $model->title)
                ]
            );
            $this->addImagesAndTags($request, $model);
            return $model->load($this->relations);
        });
    }

    public function delete(Model $model)
    {
        $model->clearMediaCollection('main');
        $model->clearMediaCollection('other');
        $this->repository->delete($model);
    }

    public function dashboardViewAny(array $option)
    {
        return QueryBuilder::for(Post::class)
            ->allowedFilters('status')
            ->allowedIncludes($relations ?? [])
            ->paginate(
                perPage: $option['perPage'] ?? 10,
                columns: $option ['columns'] ?? ['*'],
                page: $option['page'] ?? 1
            );
    }

    public function addImagesAndTags(Request $request, Model $model): void
    {
        $this->uploadToOne($model,'main_image','main');
        $this->uploadToMany($model,'gallery','other');
        $model->tags()->attach($request->tags);
    }

}
