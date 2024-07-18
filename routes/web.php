<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TagController;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\UserResource;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// User search trends query

// SELECT DISTINCT `search_query` 
// FROM (
//     SELECT `search_query`
//     FROM `activities`
//     WHERE `user_id` = 1
//       AND `type` = 'search'
//     ORDER BY `id` DESC
//     LIMIT 5
// ) AS search_trends;

// Most search keywords in last seven days

// SELECT search_query, COUNT(*) as search_count
// FROM activities
// WHERE type = 'search' AND created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
// GROUP BY search_query
// ORDER BY search_count DESC
// LIMIT 5;

// Most viewed products in last seven days

// SELECT p.name, COUNT(*) as view_counts 
// FROM activities a 
// JOIN products p 
// ON a.product_id = p.id 
// WHERE a.type = 'view' AND a.created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY) 
// GROUP BY a.product_id , p.name 
// ORDER BY view_counts DESC 
// LIMIT 5;


// Most purchased products in last seven days

// SELECT p.name, COUNT(*) as most_purchase 
// FROM activities a 
// JOIN products p 
// ON a.product_id = p.id 
// WHERE a.type = 'purchase' AND a.created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY) 
// GROUP BY a.product_id , p.name 
// ORDER BY most_purchase DESC 
// LIMIT 5;


Route::get('/', function () {

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION, 
        'products' => ProductResource::collection(Product::all())
    ]);
})->name('home');

Route::get('/shop/search', [ShopController::class, 'shop'])->name('shop.search');
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
    Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
});



Route::get('test', function () {
    $user = User::with('activities')->findOrFail(2);
    return new UserResource($user);
    // $user->activities;
    // return OrderResource::collection(Order::all());
    // return ProductResource::collection(Product::with(['tags', 'category'])->paginate());
})->name('test');
