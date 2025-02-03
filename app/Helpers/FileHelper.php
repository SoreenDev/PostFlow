<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;

class FileHelper
{
    /**
     * @throws Throwable
     */
    public static function saveFile($file, ?string $path, $customName): ?string
    {
        try {
            if (is_null($file)){
                return null;
            }

            $extension = $file->getClientOriginalExtension();
            $fileName = $customName ? $customName . '.' . $extension : Str::uuid() . '.' . $extension;
            $filePath = $path ? $path . DIRECTORY_SEPARATOR . $fileName : 'Uploads' . DIRECTORY_SEPARATOR . $fileName;

            Storage::disk('public')->putFileAs($path ?? 'Uploads', $file, $fileName);

            return $filePath;
        }catch (Throwable  $exception){
            Log::error(trans('response.file.error.store', ['item' => 'file']) . ' | Exception: ' . $exception->getMessage());
            throw $exception;
        }
    }

    /**
     * @throws Throwable
     */
    public static function deleteFile(string $filePath): null
    {
        try {
            if (!Storage::disk('public')->exists($filePath)) {
                Log::warning(trans('response.file.error.retrieve', ['item' =>'file' ]) . $filePath);
                return null;
            }

            Storage::disk('public')->delete($filePath);

            return null;
        } catch (Throwable $exception) {
            Log::error(trans('response.file.error.delete', ['item' => 'file']) . ' | Exception: ' . $exception->getMessage());
            throw $exception;
        }
    }

}
