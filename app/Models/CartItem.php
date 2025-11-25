<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\Product; // Added for the product relationship
use Illuminate\Database\Eloquent\Factories\HasFactory; // Added as it's part of the use statement in the instruction

class CartItem extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['cart_id', 'product_id', 'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
