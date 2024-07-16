<?php

namespace App\Models\Crop;

use Illuminate\Database\Eloquent\Model;

class CropCategory extends Model
{
    public $table = 'crop_categories';

    public $fillable = [
        'name'
    ];

    protected $casts = [
        'name' => 'string'
    ];

    public static array $rules = [
        'name' => 'required|string|max:100',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    public function crops(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Crop\Crop::class, 'crop_categories_id');
    }
}
