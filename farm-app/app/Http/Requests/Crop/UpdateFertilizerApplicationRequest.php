<?php

namespace App\Http\Requests\Crop;

use App\Models\Crop\FertilizerApplication;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFertilizerApplicationRequest extends FormRequest
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
        $rules = FertilizerApplication::$rules;
        
        return $rules;
    }
}
