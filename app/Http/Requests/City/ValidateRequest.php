<?php

namespace App\Http\Requests\City;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name.ar' => 'required|string|min:3|max:255',
            'name.en' => 'required|string|min:3|max:255',
            'country_id'   => 'required|exists:countries,id'
        ];
    }
}
