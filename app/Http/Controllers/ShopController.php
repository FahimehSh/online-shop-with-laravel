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
        $products = Product::orderBy('created_at')->paginate(12);


        return view('home.shop', compact('products'));
    }


    public function show(Product $product)
    {
        $mightAlsoLike = Product::query()->where('slug', '!=', $product->slug)
            ->inRandomOrder()->take(4)->get();
        return view('home.showProduct', compact('product', 'mightAlsoLike'));
    }


    public function getListProductsInCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $listProductsInCategory = $category->products()->orderBy('created_at')->paginate(12);
        return view('home.productsInCategory', compact('listProductsInCategory', 'category'));
    }

}
