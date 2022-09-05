<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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

Route::prefix('/shop')->group(function (){
    Route::get('/', [ShopController::class, 'index'])
        ->name('shop');
    Route::get('/categories/{slug}', [ShopController::class, 'getListProductsInCategory'])
        ->name('shop.productsInCategory');
});



//dashboard
Route::prefix('/dashboard')->namespace('admin-dashboard')->group(function (){
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::prefix('/categories')->group(function (){
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

    Route::prefix('/products')->group(function (){
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


Route::prefix('/profile')->group(function (){
    Route::get('/', [UserController::class, 'index'])->name('user-dashboard');
});


require __DIR__.'/auth.php';
