<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = \App\Models\Ingredients::factory(10)->create();
        \App\Models\Products::factory(10)->create()->each(function ($product) use ($ingredients){
            $ingredients->random(5)->each(function ($item) use($product){
                \App\Models\ProductIngredients::factory(rand(1, 4))->create([
                    'product_id' => $product->id,
                    'ingredient_id' => $item->id
                ]);
            });
        });
    }
}
