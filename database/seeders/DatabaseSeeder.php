<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Salman',
            'email' => 'salmanpatni92@gmail.com', 
            'is_admin' => true
        ]);

        $categories = Category::factory(3)->create();

        $tags = Tag::factory(6)->create();

        $productsData = [
            [
                'name' => 'Yellow T-Shirt', 
                'description' => 'Exclusive solid tees from NextGen Bazaar', 
                'price' => '9.99', 
                'image' => 'images/g9EE9wLe5VxQJ5CxK4Zk5FfvKqBzIRb3zbGSPLi5.jpg'
            ], 
            [
                'name' => 'Red T-Shirt', 
                'description' => 'Exclusive solid tees from NextGen Bazaar', 
                'price' => '9.99', 
                'image' => 'images/mZraRfXg19T9WX4pTxiyk3tZVCmdMyn5vsELq5I0.jpg',
            ], 
            [
                'name' => 'Black T-Shirt', 
                'description' => 'Exclusive solid tees from NextGen Bazaar', 
                'price' => '9.99', 
                'image' => 'images/RqpbZGjqps0xbKIAyWvw2vAsw8ciVAU3GTS7Uy6u.webp'
            ]
        ];

        foreach($productsData as $product){
            Product::factory()->recycle($categories)->create($product);
        }

        // $products = Product::factory(3)->recycle($categories)->create();

        // ProductTag::factory(10)->recycle($tags)->recycle($products)->create();
    }
}
