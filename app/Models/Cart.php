<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    public function cart_items()
    {
        return $this->hasMany(Cart_item::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public static function getCartItems()
    {
        return static::query()->where('user_id', Auth::id())->first();
    }

    public static function cartItemsCount()
    {
        $cart = Cart::query()->where('user_id', Auth::id())->first();
        $qty = 0;
        if (filled($cart)) {
            foreach ($cart->cart_items as $item) {
                $qty = $item->quantity + $qty;
            }
        }
        return $qty;
    }
}
