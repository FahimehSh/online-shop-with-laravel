<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at')->where('is_available', 1)->paginate(12);


        return view('home.shop', compact('products'));
    }


    public function show($slug)
    {
        $product = Product::query()->where('slug', $slug)->where('is_available', 1)->firstOrFail();
        $mightAlsoLike = Product::query()->where('is_available', 1)->where('slug', '!=', $product->slug)
            ->inRandomOrder()->take(4)->get();
        return view('home.showProduct', compact('product', 'mightAlsoLike'));
    }


    public function getListProductsInCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $listProductsInCategory = $category->products()->where('is_available', 1)->orderBy('created_at')->paginate(12);
        return view('home.productsInCategory', compact('listProductsInCategory', 'category'));
    }


}
