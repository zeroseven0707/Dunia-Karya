<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ProductFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function download($fileId)
    {
        $file = ProductFile::findOrFail($fileId);
        $product = $file->product;

        // Check if user has purchased the product
        $hasPurchased = Order::where('user_id', Auth::id())
            ->where('status', 'paid')
            ->whereHas('items', function ($query) use ($product) {
                $query->where('product_id', $product->id);
            })
            ->exists();

        if (!$hasPurchased) {
            abort(403, 'Anda belum membeli produk ini.');
        }

        if (!Storage::disk('local')->exists($file->file_path)) {
            abort(404, 'File tidak ditemukan.');
        }

        // Track download
        \App\Models\Download::create([
            'user_id' => Auth::id(),
            'product_file_id' => $file->id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        return Storage::disk('local')->download($file->file_path);
    }
}
