<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFamilyRequest extends FormRequest
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
                'regex:/^[a-zA-Z\s]+$/', 
                //Rule::unique('families', 'name')->ignore($this->route('families'))
                'unique:families,name,' . $this->family->id
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field cannot be empty',
            'name.regex' => "The name  can only contain letters and spaces",
            'name.unique' => 'This family already exists'
        ];
    }
}
