<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'content' => $this->resource->content,
            'user' => $this->whenLoaded(
                'user',
                fn() => $this->resource->user,
                $this->resource->user_id
            ),
            'likes_count' => $this->resource->likes_count,
            'likes' => $this->whenLoaded(
                'likes',
                fn() => $this->resource->likes->toResourceCollection(),
            ),
            'comments_count' => $this->resource->comments_count,
            'comments' => $this->whenLoaded(
                'comments',
                fn() => $this->resource->comments->toResourceCollection(),
            )
        ];
    }
}
