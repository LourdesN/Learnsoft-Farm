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
        'quality',
        'remaining_quantity'
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
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    // Method to calculate remaining quantity
    public function calculateRemainingQuantity()
    {
        // Get the total quantity sold for this harvest
        $totalSold = Sale::where('harvest_id', $this->id)->sum('quantity');

        // Calculate the remaining quantity
        $this->remaining_quantity = $this->quantity - $totalSold;

        // Ensure remaining quantity is not negative
        if ($this->remaining_quantity < 0) {
            $this->remaining_quantity = 0;
        }

        // Save the updated harvest
        $this->save();
    }
}
