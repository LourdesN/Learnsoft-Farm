<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'crop_categories_id',
        'planting_date',
        'harvesting_date'
    ];

    public function cropCategory()
    {
        return $this->belongsTo(CropCategory::class, 'crop_categories_id');
    }
}

