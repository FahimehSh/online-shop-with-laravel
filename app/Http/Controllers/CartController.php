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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::query()->where('user_id', Auth::id())->first();
        if (filled($cart)) {
            $cart_items = $cart->cart_items;
            return view('home.cart', compact('cart_items'));
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

            return Redirect::back();
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
                    $cart_item->save();
                } else {

                    $cart_item = new Cart_item();
                    $cart_item->cart_id = $cart->id;
                    $cart_item->product_id = $product->id;
                    $cart_item->discount_id = $product->discount_id;
                    $cart_item->sku = $product->sku;
                    $cart_item->price = $product->price;
                    $cart_item->quantity = 1;
                    $cart_item->save();
                }
            } else {
                $cart = new Cart();
                $cart->user_id = Auth::id();
                $cart->save();
                $cart_item = new Cart_item();
                $cart_item->cart_id = $cart->id;
                $cart_item->product_id = $product->id;
                $cart_item->discount_id = $product->discount_id;
                $cart_item->sku = $product->sku;
                $cart_item->price = $product->price;
                $cart_item->quantity = $product->quantity;
                $cart_item->save();
            }
        }

        return Redirect::back();
    }


    public function increamentProduct()
    {

    }


}
