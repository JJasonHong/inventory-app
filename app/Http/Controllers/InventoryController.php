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
}