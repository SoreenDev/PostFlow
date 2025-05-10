<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Request;

trait UploadFile
{
    public function uploadToOne(Model $model, string $key, string $collection_name): void
    {
        $model->clearMediaCollection($collection_name);
        $model->addMediaFromRequest($key)->toMediaCollection($collection_name);
    }

    public function uploadToMany(Model $model, $key, string $collection_name): void
    {
        $model->clearMediaCollection($collection_name);
        foreach (Request::file($key) as $file){
            $model->addMedia($file)->toMediaCollection($collection_name);
        }
    }
}
