<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Ingredients;
use App\Models\ProductIngredients;

class ProductController extends Controller
{
    private $productDetails;

    public function __construct(){


    }

    public function createProduct(Request $req){
        $this->productDetails = $req->all();
        foreach($this->productDetails['products'] as $key => $value){
            $condition  = ['product_name' => $value['name']];
            $product = Products::updateOrCreate($condition, $condition);
            foreach ($value['ingredients'] as $key2 => $val){
                    $ingCondition = ['ingredient_name' => $key2];
                    $ingredient = Ingredients::updateOrCreate($ingCondition, $ingCondition);
                    $proIngCondition = $proIngConditionInsert = ['ingredient_id' => $ingredient->id, 'product_id' => $product->id];
                    $proIngConditionInsert['qty_in_kgs'] = $this->getValue($val);
                    $prodIngredient = ProductIngredients::updateOrCreate($proIngCondition, $proIngConditionInsert);
            }
        }
        return response()
            ->json(["products" => Products::with(['productIngredients','ingredientNames'])->get()]);
    }

    public function getValue($gm)
    {
        $val = (int)$gm;
        $toKg = $val /1000;
        return $toKg;
    }

    public function getProducts(){
        return response()->json(["products" => Products::with(['productIngredients','ingredientNames'])->get()]);
    }
}
