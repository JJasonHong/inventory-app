<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Inventory;      // ← import your Inventory model
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // seed a test user
        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);

        // seed your inventory items
        Inventory::create([
            'sku'           => '8809294662039',
            'name'          => 'korean rice',
            'description'   => null,
            'quantity'      => 5,
            'reorder_level' => 0, 
            'cost_price'    => null,
            'sale_price'    => null,
        ]);

        Inventory::create([
            'sku'           => '060383054458',
            'name'          => 'orange juice',
            'description'   => null,
            'quantity'      => 12,
            'reorder_level' => 0,
            'cost_price'    => null,
            'sale_price'    => null,
        ]);
    }
}