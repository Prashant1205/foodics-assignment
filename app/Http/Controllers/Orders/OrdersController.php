<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Ingredients;
use App\Models\Orders;
use App\Models\Products;
use App\Models\IngredientsInventory;
use App\Events\SendMails;
use Exception;

class OrdersController extends Controller
{
    /**
     * [Description for makeOrder]
     *
     * @param OrderRequest $req
     *
     * @return [type]
     *
     */
    public function makeOrder(OrderRequest $req){
        $orders = $req->all();
        if(!$orders['products']){
            throw new Exception('Orders should contains products array');
        }
        foreach($orders['products'] as $order){
            $order =  Orders::create($order);
            $findIngredients = Products::with('productIngredients')->where('id', $order['product_id'])->first();
            if(!$findIngredients){
                dd($findIngredients, $order['product_id']);
            }
            foreach($findIngredients['productIngredients'] as $ingredients){
                $inventory = IngredientsInventory::where('ingredient_id',$ingredients->ingredient_id)->first();
                if(!$inventory){
                    return response()->json(['message' => 'Ingredients Inventory Not available. Invalid Product']);
                }
                $inventory->qty_used = $inventory->qty_used + $ingredients->qty_in_kgs;
                $inventory->percentage = (($inventory->qty_in_kgs - $inventory->qty_used) * 100) / $inventory->qty_in_kgs;
                if($inventory->percentage <= 0){
                    return response()->json(['message' => 'Inventory Out of stock']);
                }
                $inventory->update();
                if($inventory->percentage <= 50){
                    $ingredient = Ingredients::find($inventory->ingredient_id);
                    //triggerEvent
                    event(new SendMails($ingredient));
                }
            }
        }
        return response()->json(['order'=>  Orders::get()]);
    }

    /**
     * [Description for getOrders]
     *
     * @return [type]
     *
     */
    public function getOrders(){
        return response()->json(['order'=> Orders::get()]);
    }
}
