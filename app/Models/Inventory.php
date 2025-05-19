<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    // Use the SKU string as the PK instead of the auto-incrementing id
    protected $primaryKey = 'sku';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'sku',
        'name',
        'description',
        'quantity',
        'reorder_level',   // renamed to match your migration
        'cost_price',
        'sale_price',
    ];

    protected $casts = [
        'quantity'      => 'integer',
        'reorder_level' => 'integer',
        'cost_price'    => 'decimal:2',
        'sale_price'    => 'decimal:2',
    ];
}