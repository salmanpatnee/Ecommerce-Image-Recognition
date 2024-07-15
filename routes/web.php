<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TagController;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION, 
        'products' => ProductResource::collection(Product::all())
    ]);
})->name('home');

Route::get('/shop/product/{product}', [ShopController::class, 'product'])->name('shop.product.show');
Route::get('/shop/checkout/{product}', [ShopController::class, 'checkout'])->name('shop.checkout');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('products', ProductController::class);
});



Route::get('test', function () {
    return OrderResource::collection(Order::all());
    // return ProductResource::collection(Product::with(['tags', 'category'])->paginate());
})->name('test');
