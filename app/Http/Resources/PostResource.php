<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'author' => $this->whenLoaded(
                'author',
                fn() => $this->resource->author->toResource(),
                $this->resource->author_id
            ),
            'category' => $this->whenLoaded(
                'category',
                fn() => $this->resource->category->toResource(),
                $this->resource->category_id
            ),
            'tags' => $this->whenLoaded(
                'tags',
                fn() => $this->resource->tags->toResourceCollection(),
            ),
            'title' => $this->resource->title,
            'slug' => $this->resource->slug,
            'content' => $this->resource->content,
            'status' => $this->resource->status->title()
        ];
    }
}
