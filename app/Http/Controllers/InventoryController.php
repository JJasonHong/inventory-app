<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Return the on-hand quantity for the given SKU,
     * or a custom “Item not found” message if missing.
     *
     * @param  string  $sku_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getItem(string $sku_id)
    {
        $item = Inventory::find($sku_id);

        if (! $item) {
            return response()->json([
                'message' => 'Item not found'
            ], 404);
        }

        return response()->json([
            'sku'      => $item->sku,
            'name'     => $item->name,
            'quantity' => $item->quantity,
        ]);
    }

    /**
     * Return all items in the inventory.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllItems()
    {
        $items = Inventory::all();

        return response()->json($items);
    }

    /**
     * Add a new item to the inventory.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addItem(Request $request)
    {
        $request->validate([
            'sku'      => 'required|string|max:255|unique:inventories',
            'name'     => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
        ]);

        $item = Inventory::create($request->all());

        return response()->json($item, 201);
    }

    /**
     * Update an existing item in the inventory.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $sku_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateItem(Request $request, string $sku_id)
    {
        $item = Inventory::find($sku_id);

        if (! $item) {
            return response()->json([
                'message' => 'Item not found'
            ], 404);
        }

        $request->validate([
            'name'     => 'sometimes|required|string|max:255',
            'quantity' => 'sometimes|required|integer|min:0',
        ]);

        $item->update($request->all());

        return response()->json($item);
    }

    /**
     * Delete an item from the inventory.
     *
     * @param  string  $sku_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteItem(string $sku_id)
    {
        $item = Inventory::find($sku_id);

        if (! $item) {
            return response()->json([
                'message' => 'Item not found'
            ], 404);
        }

        $item->delete();

        return response()->json([
            'message' => 'Item deleted successfully'
        ]);
    }

    
}
