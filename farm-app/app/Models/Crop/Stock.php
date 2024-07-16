<?php

namespace App\Models\Crop;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public $table = 'stocks';

    public $fillable = [
        'name',
        'quantity',
        'stock_type',
        'price',
        'supplier_id'
    ];

    protected $casts = [
        'name' => 'string',
        'quantity' => 'string',
        'stock_type' => 'string'
    ];

    public static array $rules = [
        'name' => 'required|string|max:100',
        'quantity' => 'required|string|max:90',
        'stock_type' => 'required|string|max:100',
        'price' => 'required',
        'supplier_id' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    public function supplier(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Crop\Supplier::class, 'supplier_id');
    }

    public function fertilizerApplications(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Crop\FertilizerApplication::class, 'stock_id');
    }

    public function pesticideApplications(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Crop\PesticideApplication::class, 'stock_id');
    }
}
