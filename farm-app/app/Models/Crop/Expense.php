<?php

namespace App\Models\Crop;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public $table = 'expenses';

    public $fillable = [
        'description',
        'amount',
        'expense_date',
    ];

    protected $casts = [
        'description' => 'string',
        'amount' => 'decimal:2',
        'expense_date' => 'date'
    ];

    public static array $rules = [
        'description' => 'required|string|max:255',
        'amount' => 'required|numeric',
        'expense_date' => 'required|date',
        'expense_category_id' => 'required'
    ];

    public function getExpenseDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }
    public function category()
    {
        return $this->belongsTo(Expense_Category::class, 'expense_category_id');
    }
}
