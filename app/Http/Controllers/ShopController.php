<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function product(Product $product){

        return inertia('Shop/Show', [
            'product' => new ProductResource($product)
        ]);
    }

    public function checkout(Product $product){

        Order::create(['user_id' => auth()->user()->id, 'product_id' =>$product->id ]);

        return inertia('Shop/Checkout', [
            'product' => new ProductResource($product)
        ]);
    }
}
