<?php

namespace App\Models\Crop;

use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    public $table = 'crops';

    public $fillable = [
        'name',
        'crop_categories_id',
        'planting_date',
        'harvesting_date'
    ];

    protected $casts = [
        'name' => 'string',
        'planting_date' => 'date',
        'harvesting_date' => 'date'
    ];

    public static array $rules = [
        'name' => 'required|string|max:100',
        'crop_categories_id' => 'required',
        'planting_date' => 'required',
        'harvesting_date' => 'required'
    ];

    public function cropCategories(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Crop\CropCategory::class, 'crop_categories_id');
    }

    public function harvests(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Crop\Harvest::class, 'crop_id');
    }

    public function plantings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Crop\Planting::class, 'crops_id');
    }

    public function storedCrops(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Crop\StoredCrop::class, 'crop_id');
    }
    public function getPlantingDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }
    public function getHarvestDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }
}
