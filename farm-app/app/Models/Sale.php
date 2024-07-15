<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'stored_crops_id',
        'customer_id',
        'sales_date',
        'quantity',
        'price_per_unit',
        'total_price',
    ];

    public function storedCrop()
    {
        return $this->belongsTo(StoredCrop::class, 'stored_crops_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}

