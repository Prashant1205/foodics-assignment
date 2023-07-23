<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Inventory\InventoryController;
use App\Http\Controllers\Orders\OrdersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => '/create'], function(){
    Route::post('/product',  [ProductController::class, 'createProduct']);
    Route::post('/ingredient-inventory', [InventoryController::class, 'reloadInventory']);
    Route::post('/order', [OrdersController::class, 'makeOrder']);
});

Route::group(['prefix'=>'/fetch'], function(){
    Route::get('/products',  [ProductController::class, 'getProducts']);
    Route::get('/inventory',  [InventoryController::class, 'getInventory']);
    Route::get('/orders',  [OrdersController::class, 'getOrders']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
