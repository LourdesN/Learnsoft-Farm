<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoredCrop extends Model
{
    use HasFactory;

    protected $fillable = [
        'crop_id',
        'quantity',
        'storage_date',
        'storage_id',
        'harvest_id',
    ];

    // Relationships
    public function crop()
    {
        return $this->belongsTo(Crop::class, 'crop_id');
    }

    public function storage()
    {
        return $this->belongsTo(Storage::class, 'storage_id');
    }

    public function harvest()
    {
        return $this->belongsTo(Harvest::class, 'harvest_id');
    }
}

