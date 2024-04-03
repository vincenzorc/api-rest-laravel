<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCountryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'max:100',
                'regex:/^[a-zA-Z ]+$/u',
                'unique:countries,name'
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "The  country name field can not be empty",
            'name.max' => "The country name must not exceed 100 characters in length",
            'name.regex' => "Only letters and spaces are allowed for the country name",
            'name.unique' => "This country already exists"
        ];
    }
}
