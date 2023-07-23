<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_name'
    ];

    /**
     * [Description for productIngredients]
     *
     * @return [type]
     *
     */
    public function productIngredients()
    {
        return $this->hasMany(ProductIngredients::class, 'product_id');
    }

    /**
     * [Description for ingredientNames]
     *
     * @return [type]
     *
     */
    public function ingredientNames()
    {
        return $this->hasManyThrough(
            Ingredients::class,
            ProductIngredients::class,
            'ingredient_id',
            'id'
        );
    }
}
