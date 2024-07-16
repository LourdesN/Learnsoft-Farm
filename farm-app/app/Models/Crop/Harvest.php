<?php

namespace App\Models\Crop;

use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    public $table = 'harvests';

    public $fillable = [
        'crop_id',
        'harvest_date',
        'quantity',
        'quality'
    ];

    protected $casts = [
        'harvest_date' => 'date',
        'quantity' => 'string',
        'quality' => 'string'
    ];

    public static array $rules = [
        'crop_id' => 'required',
        'harvest_date' => 'required',
        'quantity' => 'nullable|string|max:90',
        'quality' => 'required|string|max:90'
    ];

    public function crop(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Crop\Crop::class, 'crop_id');
    }

    public function storedCrops(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Crop\StoredCrop::class, 'harvest_id');
    }
    public function getHarvestDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }
}
