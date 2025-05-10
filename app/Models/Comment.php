<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    protected $fillable= ['user_id', 'commentable_id', 'commentable_type', 'content'];

    protected $appends = ['likes_count', 'comments_count'];

    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }
    public function getCommentsCountAttribute()
    {
        return $this->comments()->count();
    }

    public function commentable(): MorphTo
    {
        return $this->morphTo(Comment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
