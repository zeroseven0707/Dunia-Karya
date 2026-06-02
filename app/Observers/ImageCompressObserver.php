<?php

namespace App\Observers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Spatie\Image\Image;

class ImageCompressObserver
{
    /**
     * Compress an image file on the public disk.
     *
     * @param string|null $path     Relative path on public disk
     * @param int         $quality  JPEG quality 1–100
     * @param int|null    $maxWidth Max width in px, null = no resize
     */
    public static function compress(?string $path, int $quality = 80, ?int $maxWidth = null): void
    {
        if (!$path) return;

        try {
            $fullPath = Storage::disk('public')->path($path);

            if (!file_exists($fullPath)) return;

            $image = Image::load($fullPath);

            // Resize if wider than maxWidth (preserve aspect ratio)
            if ($maxWidth) {
                $image->width($maxWidth);
            }

            $image->quality($quality)->save($fullPath);

        } catch (\Throwable $e) {
            Log::warning('ImageCompress: failed — ' . $e->getMessage(), ['path' => $path]);
        }
    }
}
