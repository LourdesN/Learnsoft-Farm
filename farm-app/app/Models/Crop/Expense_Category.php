<?php

namespace App\Models\Crop;

use Illuminate\Database\Eloquent\Model;

class Expense_Category extends Model
{
    public $table = 'expense_categories';

    public $fillable = [
        'name'
    ];

    protected $casts = [
        'name' => 'string'
    ];

    public static array $rules = [
        'name' => 'required|string|max:100'
    ];

    
}
