<?php

namespace App\Models\Crop;

use Illuminate\Database\Eloquent\Model;

class PesticideApplication extends Model
{
    public $table = 'pesticide_applications';

    public $fillable = [
        'stock_id',
        'application_date',
        'quantity'
    ];

    protected $casts = [
        'application_date' => 'date',
        'quantity' => 'string'
    ];

    public static array $rules = [
        'stock_id' => 'required',
        'application_date' => 'required',
        'quantity' => 'required|string|max:90',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    public function stock(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Crop\Stock::class, 'stock_id');
    }
    public function getApplicationDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }
}
