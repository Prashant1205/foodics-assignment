<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ingredient_name'
    ];

    public function inventory(){
        return $this->hasOne(IngredientsInventory::class,'ingredient_id');
    }

    public function productingredient(){
        return $this->hasMany(ProductIngredients::class,'ingredient_id');
    }
}
