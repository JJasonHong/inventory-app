<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Inventory lookup route
Route::get('/inventory/{sku_id}', [InventoryController::class, 'getItem'])
     ->name('inventory.getItem');
