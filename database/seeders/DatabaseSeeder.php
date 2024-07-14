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
        ]);

        $categories = Category::factory(5)->create();

        $tags = Tag::factory(10)->create();

        $products = Product::factory(10)->recycle($categories)->create();

        ProductTag::factory(30)->recycle($tags)->recycle($products)->create();
    }
}
