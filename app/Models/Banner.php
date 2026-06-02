<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use App\Observers\ImageCompressObserver;
use Illuminate\Support\Facades\Cache;

class Banner extends Model
{
    use HasUuids;
    protected $guarded = ['id'];

    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('banners.all');
        });
        static::deleted(function () {
            Cache::forget('banners.all');
        });

        static::created(function ($banner) {
            ImageCompressObserver::compress($banner->path, quality: 80, maxWidth: 1920);
        });
        static::updated(function ($banner) {
            if ($banner->isDirty('path')) {
                ImageCompressObserver::compress($banner->path, quality: 80, maxWidth: 1920);
            }
        });
    }
}
