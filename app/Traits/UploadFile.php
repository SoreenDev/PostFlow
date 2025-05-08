<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait UploadFile
{
    public function uploadToOne(Model $model, string $key, string $collection_name): void
    {
        $model->clearMediaCollection($collection_name);
        $model->addMediaFromRequest($key)->toMediaCollection($collection_name);
    }

    public function uploadToMany(Model $model, $keys, string $collection_name): void
    {
        $model->clearMediaCollection($collection_name);
        $model->addMultipleMediaFromRequest($keys)->toMediaCollection($collection_name);
    }
}
