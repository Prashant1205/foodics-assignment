<?php

namespace Database\Seeders;

use App\Models\Ingredients;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngridientInventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingredients::all()->each(function($items){
            \App\Models\IngredientsInventory::factory()->create([
                'ingredient_id' => $items->id
            ]);
        });
    }
}
