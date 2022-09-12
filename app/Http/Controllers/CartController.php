<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_item;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function index()
    {
        $cart = Cart::query()->where('user_id', Auth::id())->first();

        if (filled($cart)) {
            $cart_items = $cart->cart_items;
            $subTotalPrice = $this->getTotalPrice($cart);
            $sumTotalDiscount = $this->getTotalDiscount($cart);
            return view('home.cart', compact('cart_items', 'subTotalPrice', 'sumTotalDiscount'));
        }

        return Redirect::back();

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCartItem(Product $product)
    {
        if (Auth::check()) {
            $cart = Cart::query()->where('user_id', Auth::id())->first();
            $cart_item = Cart_item::query()->where('product_id', $product->id)->where('cart_id', $cart->id);

            if ($cart_item->exists()) {
                $cart_item->delete();
            }

            if (!filled(Cart_item::where('cart_id', $cart->id)->get())) {
                $cart->delete();
            }

            return back();
        }
    }

    public function addToCart(Product $product)
    {
        if (Auth::check()) {
            if (Cart::query()->where('user_id', Auth::id())->exists()) {
                $cart = Cart::query()->where('user_id', Auth::id())->first();

                if (Cart_item::query()->where('product_id', $product->id)->where('cart_id', $cart->id)->exists()) {
                    $cart_item = Cart_item::query()->where('product_id', $product->id)
                        ->where('cart_id', $cart->id)->first();
                    $cart_item->quantity = $cart_item->quantity + 1;
                    $cart_item->price = $cart_item->quantity * $product->price;
                    $cart_item->save();
                } else {

                    $this->createCartItem($cart, $product);
                }
            } else {
                $cart = new Cart();
                $cart->user_id = Auth::id();
                $cart->save();
                $this->createCartItem($cart, $product);
            }
        }

        return back();
    }

    public static function getTotalPrice($cart)
    {
        $totalPrice = 0;
        foreach ($cart->cart_items as $cart_item) {
            $totalPrice += $cart_item->price;
        }

        return $totalPrice;
    }

    public static function getTotalDiscount($cart)
    {
        $totalDiscount = 0;
        foreach ($cart->cart_items as $cart_item) {
            if (filled($cart_item->discount)) {
                $totalDiscount += $cart_item->discount->amount;
            } else {
                $totalDiscount = 0;
            }
            return $totalDiscount;
        }
    }

    public function createCartItem($cart, $product)
    {
        $cart_item = new Cart_item();
        $cart_item->cart_id = $cart->id;
        $cart_item->product_id = $product->id;
        $cart_item->discount_id = $product->discount_id;
        $cart_item->sku = $product->sku;
        $cart_item->price = $product->price;
        $cart_item->quantity = 1;
        $cart_item->save();
    }

    public static function destroy(Cart $cart)
    {
        $cart->cart_items()->delete();
        $cart->delete();
    }


}
