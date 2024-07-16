<?php

namespace App\Http\Requests\Crop;

use App\Models\Crop\Crop;
use Illuminate\Foundation\Http\FormRequest;

class CreateCropRequest extends FormRequest
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
        return Crop::$rules;
    }
}
