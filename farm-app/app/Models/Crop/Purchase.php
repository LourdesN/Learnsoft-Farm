<?php

namespace App\Models\Crop;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public $table = 'purchases';

    public $fillable = [
        'stock_type',
        'supplier_id',
        'purchase_date',
        'quantity',
        'total_cost'
    ];

    protected $casts = [
        'stock_type' => 'string',
        'purchase_date' => 'date',
        'quantity' => 'string'
    ];

    public static array $rules = [
        'stock_type' => 'required|string|max:100',
        'supplier_id' => 'required',
        'purchase_date' => 'required',
        'quantity' => 'required|string|max:90',
        'total_cost' => 'required'
    ];

    public function supplier(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Crop\Supplier::class, 'supplier_id');
    }
    public function getPurchaseDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }
}
