<?php

namespace App\Models;

use App\Enums\PostStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable = ['author_id', 'category_id', 'title', 'slug', 'content', 'status'];
    protected function casts(): array
    {
        return [
            'status' => PostStatusEnum::class
        ];
    }
    protected $appends = ['likes_count', 'comments_count'];

    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }
    public function getCommentsCountAttribute()
    {
        return $this->comments()->count();
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('main')
            ->useDisk("images")
            ->acceptsMimeTypes([
                "image/png",
                "image/jpg",
                "image/jpeg",
                "image/img",
            ]);
        $this
            ->addMediaCollection('other')
            ->useDisk("images")
            ->acceptsMimeTypes([
                "image/png",
                "image/jpg",
                "image/jpeg",
                "image/img",
            ]);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'category_id', 'id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
