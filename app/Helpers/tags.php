<?php

use App\Models\Tag;

if (!function_exists('tags')) {
    function tags()
    {
        $tags = Tag::take(5)->get();

        return $tags;
    }
}
