<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasUuids;
    protected $guarded = ['id'];
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
