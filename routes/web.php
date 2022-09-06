<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//home
Route::get('/', [HomeController::class, 'index'])->name('main');

Route::prefix('/shop')->namespace('shop')->group(function () {
    Route::get('/', [ShopController::class, 'index'])
        ->name('shop');
    Route::get('/categories/{slug}', [ShopController::class, 'getListProductsInCategory'])
        ->name('shop.productsInCategory');
    Route::get('/{product}', [ShopController::class, 'show'])
        ->name('show.product');


    Route::prefix('/cart')->namespace('cart')->group(function (){
        Route::get('/', [CartController::class, 'index'])
            ->name('cart.items');
        Route::get('/add-to-cart/{product}', [CartController::class, 'addToCart'])
            ->name('add.to.cart');
        Route::get('/destroy/{product}', [CartController::class, 'deleteCartItem'])
            ->name('destroy.cartItem');
        Route::get('increament/{product}', [CartController::class, 'increamentProduct'])
            ->name('increament.product');
//        Route::get('decrement/{product}', [CartController::class, 'decreamentProduct'])
//            ->name('decreament.product');
    });
});


//dashboard
Route::prefix('/dashboard')->namespace('admin-dashboard')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::prefix('/categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])
            ->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])
            ->name('categories.create');
        Route::post('/store', [CategoryController::class, 'store'])
            ->name('categories.store');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])
            ->name('categories.edit');
        Route::post('/update/{category}', [CategoryController::class, 'update'])
            ->name('categories.update');
        Route::get('/destroy/{category}', [CategoryController::class, 'destroy'])
            ->name('categories.destroy');
    });

    Route::prefix('/products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])
            ->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])
            ->name('products.create');
        Route::post('/store', [ProductController::class, 'store'])
            ->name('products.store');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])
            ->name('products.edit');
        Route::post('/update/{product}', [ProductController::class, 'update'])
            ->name('products.update');
        Route::get('/destroy/{product}', [ProductController::class, 'destroy'])
            ->name('products.destroy');
    });
});


Route::prefix('/profile')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user-dashboard');
});


require __DIR__ . '/auth.php';
