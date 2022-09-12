<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\City;
use App\Models\Gateway;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();
        $cities = City::all();
        $address = Address::query()->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')->first();
        $gateways = Gateway::all();

        if (Auth::check()) {
            $cart = Cart::query()->where('user_id', Auth::id())->first();
            if ($cart->exists() && filled($cart->cart_items)) {
                $cart_items = $cart->cart_items;
                $subTotalPrice = CartController::getTotalPrice($cart);
                $sumTotalDiscount = CartController::getTotalDiscount($cart);
            }
        }
        return view('home.checkout',
            compact('states', 'cities', 'cart_items',
                'subTotalPrice', 'sumTotalDiscount', 'address', 'gateways'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
