<?php

namespace App\Models\Crop;

use Illuminate\Database\Eloquent\Model;

class StoredCrop extends Model
{
    public $table = 'stored_crops';

    public $fillable = [
        'crop_id',
        'quantity',
        'storage_date',
        'storage_id',
        'harvest_id'
    ];

    protected $casts = [
        'quantity' => 'string',
        'storage_date' => 'date'
    ];

    public static array $rules = [
        'crop_id' => 'required',
        'quantity' => 'required|string|max:90',
        'storage_date' => 'nullable',
        'storage_id' => 'required',
        'harvest_id' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    public function crop(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Crop\Crop::class, 'crop_id');
    }

    public function harvest(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Crop\Harvest::class, 'harvest_id');
    }

    public function storage(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Crop\Storage::class, 'storage_id');
    }

    public function sales(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Crop\Sale::class, 'stored_crops_id');
    }
    public function getStorageDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }
}
