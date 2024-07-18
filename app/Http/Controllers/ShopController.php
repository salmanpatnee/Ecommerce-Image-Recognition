<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Activity;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop(Request $request) {
        $term = $request->get('query');

        $products = Product::where('name', 'like', '%'.$term.'%')
            ->orWhereHas('category', function($query) use ($term) {
            $query->where('name', 'like', '%' . $term . '%');
        })
        ->orWhereHas('tags', function($query) use ($term) {
            $query->where('name', 'like', '%' . $term . '%');
        })->get();

        Activity::create([
            'user_id' => auth()->user()->id, 
            'product_id' => null, 
            'type' => 'search', 
            'search_query' => $term, 
            
        ]);

        return inertia('Search', [
            'query' => $term,
            'products' => ProductResource::collection($products)
        ]);
    }

    public function product(Product $product){

        $today = Carbon::today();
        
        $activity = Activity::where('user_id', auth()->user()->id)
            ->where('product_id', $product->id)
            ->where('type', 'view')
            ->whereDate('created_at', $today)
            ->get();


        if(!count($activity)){
            Activity::create([
                'user_id' => auth()->user()->id, 
                'product_id' => $product->id, 
                'type' => 'view'
            ]);
        }

    
        return inertia('Shop/Show', [
            'product' => new ProductResource($product)
        ]);
    }

    public function checkout(Product $product){

        Order::create(['user_id' => auth()->user()->id, 'product_id' =>$product->id ]);

        Activity::create([
            'user_id' => auth()->user()->id, 
            'product_id' => $product->id, 
            'type' => 'purchase'
        ]);

        return inertia('Shop/Checkout', [
            'product' => new ProductResource($product)
        ]);
    }
}
