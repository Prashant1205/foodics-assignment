<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IngredientsInventory;
use App\Models\Ingredients;

class InventoryController extends Controller
{
    /**
     * [Description for reloadInventory]
     *
     * @param Request $req
     *
     * @return [type]
     *
     */
    public function reloadInventory(Request $req){
        foreach($req->all() as $key => $val){
            $ingredient = Ingredients::updateOrCreate(['ingredient_name' => $key]);
            $createInventory = [
                'ingredient_id' => $ingredient->id,
                'qty_in_kgs' => $val,
                'qty_used' => 0,
                'percentage' => 100
            ];
            IngredientsInventory::updateOrCreate(['ingredient_id' => $ingredient->id], $createInventory);
        }
        return response()->json(['ingredients' => IngredientsInventory::with('ingredients')->get()]);
    }

    /**
     * [Description for getInventory]
     *
     * @return [type]
     *
     */
    public function getInventory(){
        return response()->json(['ingredients' => IngredientsInventory::with('ingredients')->get()]);
    }
}
