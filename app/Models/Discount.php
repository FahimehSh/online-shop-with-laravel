<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    public static function getDiscounts()
    {
        return static::all();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function cart_items()
    {
        return $this->belongsToMany(Cart_item::class);
    }
}
