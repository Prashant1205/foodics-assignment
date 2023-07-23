<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IngredientsInventory>
 */
class IngredientsInventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'qty_in_kgs' => rand(10,100),
            'percentage' => 100,
            'qty_used' => 0
        ];
    }
}
