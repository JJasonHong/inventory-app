<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route to get list of all items quantity less than reorder level
Route::get('/inventory/low-stock', [InventoryController::class, 'getLowStockItems'])
     ->name('inventory.getLowStockItems');

// Inventory lookup route
Route::get('/inventory/{sku_id}', [InventoryController::class, 'getItem'])
     ->name('inventory.getItem');

// Route to get all items in the inventory
Route::get('/inventory', [InventoryController::class, 'getAllItems'])
     ->name('inventory.getAllItems');

// Route to add a new item to the inventory
Route::post('/inventory', [InventoryController::class, 'addItem'])
     ->name('inventory.addItem');

// Route to update an existing item in the inventory
Route::put('/inventory/{sku_id}', [InventoryController::class, 'updateItem'])
     ->name('inventory.updateItem');

// Route to delete an item from the inventory
Route::delete('/inventory/{sku_id}', [InventoryController::class, 'deleteItem'])
     ->name('inventory.deleteItem');
