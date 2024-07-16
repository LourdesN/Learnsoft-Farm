<?php

namespace App\Models\Crop;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public $table = 'suppliers';

    public $fillable = [
        'name',
        'phone_number',
        'address',
        'supplies_type'
    ];

    protected $casts = [
        'name' => 'string',
        'address' => 'string',
        'supplies_type' => 'string'
    ];

    public static array $rules = [
        'name' => 'required|string|max:100',
        'phone_number' => 'required',
        'address' => 'required|string|max:100',
        'supplies_type' => 'required|string|max:100',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    public function purchases(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Crop\Purchase::class, 'supplier_id');
    }

    public function stocks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Crop\Stock::class, 'supplier_id');
    }
}
