<?php

namespace App\Models\Crop;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    public $table = 'storages';

    public $fillable = [
        'location',
        'capacity'
    ];

    protected $casts = [
        'location' => 'string',
        'capacity' => 'string'
    ];

    public static array $rules = [
        'location' => 'required|string|max:255',
        'capacity' => 'required|string|max:100'
    ];

    public function storedCrops(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Crop\StoredCrop::class, 'storage_id');
    }
}
