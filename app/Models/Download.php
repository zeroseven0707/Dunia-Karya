<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasUuids;
    
    protected $fillable = [
        'user_id',
        'product_file_id',
        'ip_address',
        'user_agent',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productFile()
    {
        return $this->belongsTo(ProductFile::class);
    }
}
