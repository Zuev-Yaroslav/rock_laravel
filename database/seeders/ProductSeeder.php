<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = Product::factory(50)->create();
        $product->each(function (Product $product) {
            Comment::factory(random_int(1, 10))->create([
                'commentable_id' => $product->id,
                'commentable_type' => Product::class,
            ]);
        });
    }
}
