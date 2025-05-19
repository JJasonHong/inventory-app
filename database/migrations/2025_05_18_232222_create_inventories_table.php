<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->string('sku')->primary();
            $table->string('name');                              // material name
            $table->text('description')->nullable();             // optional details
            $table->integer('quantity')->default(0);             // current on-hand count
            $table->integer('reorder_level')->default(0);             // trigger for low-stock alerts
            $table->decimal('cost_price', 10, 2)->nullable();     // how much it costs you
            $table->decimal('sale_price', 10, 2)->nullable();     // retail price
            $table->timestamps();                                // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
