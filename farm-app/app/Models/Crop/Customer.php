<?php

namespace App\Models\Crop;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $table = 'customers';

    public $fillable = [
        'full_name',
        'phone_number',
        'email',
        'address'
    ];

    protected $casts = [
        'full_name' => 'string',
        'email' => 'string',
        'address' => 'string'
    ];

    public static array $rules = [
        'full_name' => 'required|string|max:100',
        'phone_number' => 'required',
        'email' => 'nullable|string|max:80',
        'address' => 'required|string|max:100'
    ];

    public function sales(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Crop\Sale::class, 'customer_id');
    }
}
