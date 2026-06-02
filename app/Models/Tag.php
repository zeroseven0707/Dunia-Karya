<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasUuids;
    protected $guarded = ['id'];

    protected static function booted()
    {
        static::creating(function ($tag) {
            $tag->slug = Str::slug($tag->name);
        });
        static::updating(function ($tag) {
            if ($tag->isDirty('name')) {
                $tag->slug = Str::slug($tag->name);
            }
        });
        static::saved(function ()  { Cache::forget('tags.all'); });
        static::deleted(function () { Cache::forget('tags.all'); });
    }

    public function products()
    {
        return $this->belongsToMany(\App\Models\Product::class, 'product_tags', 'tag_id', 'product_id')->withTimestamps();
    }
}
