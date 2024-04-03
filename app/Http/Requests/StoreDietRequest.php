<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDietRequest extends FormRequest
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
                'alpha'
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "The name is required",
            'name.max'      => "The name cannot be longer than 100 characters",
            'name.alpha'    => "Only letters are allowed in the name of the diet"
        ];
    }
}
