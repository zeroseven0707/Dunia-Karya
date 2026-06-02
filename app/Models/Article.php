<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Observers\ImageCompressObserver;

class Article extends Model
{
    use HasUuids;
    protected $guarded = ['id'];

    protected static function booted()
    {
        static::creating(function ($article) {
            $article->slug = Str::slug($article->title);
        });

        static::updating(function ($article) {
            if ($article->isDirty('title')) {
                $article->slug = Str::slug($article->title);
            }
        });

        static::created(function ($article) {
            ImageCompressObserver::compress($article->image, quality: 80, maxWidth: 1200);
        });

        static::updated(function ($article) {
            if ($article->isDirty('image')) {
                ImageCompressObserver::compress($article->image, quality: 80, maxWidth: 1200);
            }
        });
    }
}
