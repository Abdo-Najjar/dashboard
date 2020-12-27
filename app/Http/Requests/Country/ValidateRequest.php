<?php

namespace App\Http\Requests\Country;

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
            'currency.ar' => 'required|string|min:3|max:255',
            'currency.en' => 'required|string|min:3|max:255',
            'zip_code' => 'required|string|min:3|max:255',
            'tax' => 'required|numeric|integer|min:0',
            'price_of_first_ten_kilo' => 'required|min:0',
            'price_for_kilo' => 'required|numeric|integer|min:0',
            'profitRatio' => 'required|numeric|integer|min:0|max:100',
            'country_code' => 'required',
            'contact_number' => 'required|min:9|max:11',
            'longitude' =>'required|numeric',
            'latitude'  =>'required|numeric'
        ];
    }
}
