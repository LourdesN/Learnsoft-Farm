<?php

namespace App\Http\Requests\Crop;

use App\Models\Crop\PesticideApplication;
use Illuminate\Foundation\Http\FormRequest;

class CreatePesticideApplicationRequest extends FormRequest
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
        return PesticideApplication::$rules;
    }
}
