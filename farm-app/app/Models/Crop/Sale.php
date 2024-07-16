<?php

namespace App\Models\Crop;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public $table = 'sales';

    public $fillable = [
        'stored_crops_id',
        'sales_date',
        'quantity',
        'price_per_unit',
        'total_price',
        'customer_id'
    ];

    protected $casts = [
        'sales_date' => 'date',
        'quantity' => 'string'
    ];

    public static array $rules = [
        'stored_crops_id' => 'nullable',
        'sales_date' => 'required',
        'quantity' => 'required|string|max:90',
        'price_per_unit' => 'required',
        'total_price' => 'nullable',
        'customer_id' => 'required'
    ];

    public function customer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Crop\Customer::class, 'customer_id');
    }

    public function storedCrops(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Crop\StoredCrop::class, 'stored_crops_id');
    }

    public function revenues(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Crop\Revenue::class, 'sale_id');
    }
    public function getSalesDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }
}
