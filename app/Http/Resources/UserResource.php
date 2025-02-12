<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this->resource->email,
            'roles' => $this->whenLoaded('roles', RoleResource::collection($this->resource->roles)),
            'metadata' => $this->whenLoaded('meta', UserMetaResource::make($this->resource->meta))
        ];
    }
}
