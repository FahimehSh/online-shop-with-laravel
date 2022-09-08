<?php

namespace App\Providers;

use App\Http\Controllers\CartController;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
            'dashboard.admin.categories.create',
            'dashboard.admin.categories.edit',
            'home.main'
        ], function ($view){
            $view->with('categories', Category::getCategories());
        } );

        View::composer([
            'dashboard.admin.products.*',
        ], function ($view){
            $view->with('brands', Brand::getBrands());
            $view->with('suppliers', Supplier::getSuppliers());
            $view->with('discounts', Discount::getDiscounts());
        });

        View::composer([
            'dashboard.admin.products.create',
            'dashboard.admin.products.edit',
            'home.*'
        ], function ($view){
            $view->with('headerProducts', Product::getHeaderProducts());
            $view->with('firstCategories', Category::getFirstCategories());
            $view->with('cart', Cart::getCartItems());
            $view->with('cartItemsCount', Cart::cartItemsCount());
        });

        View::composer('dashboard.*', function ($view){
            $view->with('user_pic', User::getUserImage());
        });
    }
}
