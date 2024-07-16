<?php

namespace App\Http\Requests\Crop;

use App\Models\Crop\Expense_Category;
use Illuminate\Foundation\Http\FormRequest;

class CreateExpense_CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Expense_Category::$rules;
    }
}
