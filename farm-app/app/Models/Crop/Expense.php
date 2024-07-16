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
        'expense_category'
    ];

    protected $casts = [
        'description' => 'string',
        'expense_date' => 'date',
        'expense_category' => 'string'
    ];

    public static array $rules = [
        'description' => 'required|string',
        'amount' => 'required',
        'expense_date' => 'required',
        'expense_category' => 'required|string|max:100'
    ];

    public function getExpenseDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }
}
