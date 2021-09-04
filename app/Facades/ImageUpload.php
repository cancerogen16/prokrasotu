<?php

namespace App\Facades;

use App\Contracts\UploadImageServiceContract;
use Illuminate\Support\Facades\Facade;

class ImageUpload extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return UploadImageServiceContract::class;
    }
}
