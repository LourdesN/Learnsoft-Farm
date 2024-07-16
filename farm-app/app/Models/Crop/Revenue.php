<?php

namespace App\Models\Crop;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    public $table = 'revenues';

    public $fillable = [
        'sale_id',
        'amount',
        'revenue_date'
    ];

    protected $casts = [
        'revenue_date' => 'date'
    ];

    public static array $rules = [
        'sale_id' => 'required',
        'amount' => 'required',
        'revenue_date' => 'required'
    ];

    public function sale(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Crop\Sale::class, 'sale_id');
    }
    public function getRevenueDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }
}
