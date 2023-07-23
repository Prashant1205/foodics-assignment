<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * [Description IngredientsInventory]
 */
class IngredientsInventory extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     * ̰ 
     * @var array<int, string>
     */
    protected $fillable = [
        'ingredient_id',
        'qty_in_kgs',
        'qty_used',
        'percentage'
    ];

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
