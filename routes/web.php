<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TransactionController;
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
});

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.items');
    Route::get('/add-to-cart/{product}', [CartController::class, 'addToCart'])
        ->name('add.to.cart');
    Route::get('/destroy/{product}', [CartController::class, 'deleteCartItem'])
        ->name('destroy.cartItem');


    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.store');
    Route::get('/thankyou', [ConfirmationController::class, 'index'])
        ->name('thankyou');


    Route::post('/order', [OrderController::class, 'store'])
        ->name('order.store');
});


//dashboard
Route::prefix('/dashboard')->namespace('admin-dashboard')->middleware(['auth', 'admin'])->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('admin.index');

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
        Route::get('/destroy/{product}/{file}', [ProductController::class, 'destroyFile'])
            ->name('products.destroy.file');
    });

    Route::get('/destroy/{attribute}', [AttributeController::class, 'destroy'])
        ->name('attributes.destroy.attribute');

    Route::prefix('/personal-info')->group(function () {
        Route::get('/', [AdminController::class, 'show'])
            ->name('personal-info');
        Route::get('/edit', [AdminController::class, 'edit'])
            ->name('personal-info.edit');
        Route::post('/update', [AdminController::class, 'update'])
            ->name('personal.info.update');

        Route::prefix('/addresses')->group(function () {
            Route::get('/', [AddressController::class, 'index'])
                ->name('personal-info.address.index');
            Route::get('/create', [AddressController::class, 'create'])
                ->name('personal-info.address.create');
            Route::post('/store', [AddressController::class, 'store'])
                ->name('personal-info.address.store');
            Route::get('/edit/{address}', [AddressController::class, 'edit'])
                ->name('personal-info.address.edit');
            Route::post('/update/{address}', [AddressController::class, 'update'])
                ->name('personal-info.address.update');
            Route::get('/destroy/{address}', [AddressController::class, 'destroy'])
                ->name('personal-info.address.destroy');
        });

    });

    Route::get('/orders', [OrderController::class, 'index'])
        ->name('orders.index');

    Route::get('/transactions', [TransactionController::class, 'index'])
        ->name('transactions.index');
});


Route::get('/profile', [UserController::class, 'index'])
    ->name('user.index')->middleware('auth');


require __DIR__ . '/auth.php';
