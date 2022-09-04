<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Supplier;
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
            'dashboard.admin.products.create',
            'dashboard.admin.products.edit'
        ], function ($view){
            $view->with('categories', Category::getCategories());
        } );

        View::composer([
            'dashboard.admin.products.create',
            'dashboard.admin.products.edit',
        ], function ($view){
            $view->with('brands', Brand::getBrands());
            $view->with('suppliers', Supplier::getSuppliers());
            $view->with('discounts', Discount::getDiscounts());
        });
    }
}
