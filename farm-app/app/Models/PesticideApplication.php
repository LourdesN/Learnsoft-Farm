<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesticideApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_id',
        'application_date',
        'quantity',
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }
}

