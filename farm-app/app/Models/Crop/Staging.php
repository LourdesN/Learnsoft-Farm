<?php

namespace App\Models\Crop;

use Illuminate\Database\Eloquent\Model;

class Staging extends Model
{
    public $table = 'staging';

    public $fillable = [
        'crop_id',
        'quantity'
    ];

    protected $casts = [
        
    ];

    public static array $rules = [
        'crop_id' => 'required',
        'quantity' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function crop()
    {
        return $this->belongsTo(Crop::class);
    }
}
