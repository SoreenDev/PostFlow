<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserMetaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'username' => $this->resource->user_name,
            'first_name' => $this->resource->first_name,
            'last_name' => $this->resource->last_name,
            'profile_path' => $this->resource->profile_path
        ];
    }
}
