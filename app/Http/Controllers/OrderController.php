<?php

namespace App\Http\Controllers;

use App\Events\OrderRegistered;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::query()->paginate(10);
        return view('dashboard.admin.orders.index', compact('orders'));
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
        if (Auth::check()) {
            if (Cart::query()->where('user_id', Auth::id())->exists()) {
                $cart = Cart::query()->where('user_id', Auth::id())->first();

                if (filled($cart->cart_items)) {
                    $order = new Order();
                    $order->user_id = Auth::id();
                    $order->address_id = Auth::user()->addresses()->orderBy('created_at', 'desc')->first()->id;
                    $order->total_shipping = 25000;
                    $order->total_price = CartController::getTotalPrice($cart) + 25000;
                    $order->status = 'new';
                    $order->save();

                    $this->createOrderItem($cart, $order);

                    CartController::destroy($cart);

                    $gateway_id = $request->gateway_id;
                    TransactionController::store($gateway_id, $order);

                    $user = Auth::user();
                    event(new OrderRegistered($user, $order));

                    return Redirect::route('thankyou');

                }
                return Redirect::route('shop');
            }
            return Redirect::route('shop');
        }
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

    public function createOrderItem($cart, $order)
    {
        foreach ($cart->cart_items as $cart_item) {
            $order_item = new Order_item();
            $order_item->order_id = $order->id;
            $order_item->user_id = Auth::id();
            $order_item->discount_id = $cart_item->discount_id;
            $order_item->sku = $cart_item->sku;
            $order_item->price = $cart_item->products->price;
            $order_item->quantity = $cart_item->quantity;
            $order_item->total_price = $cart_item->price;
            $order_item->save();
        }
    }
}
