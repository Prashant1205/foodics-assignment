<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIngredients extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     * ̰ 
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'ingredient_id',
        'qty_in_kgs'
    ];

    /**
     * [Description for products]
     *
     * @return [type]
     *
     */
    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    /**
     * [Description for ingredients]
     *
     * @return [type]
     *
     */
    public function ingredients()
    {
        return $this->belongsTo(Ingredients::class, 'ingredient_id');
    }
}
