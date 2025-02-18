<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFishRequest extends FormRequest
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
            'name' => ['required', 'string', 'unique:fish,name,' . $this->fish->id],
            'scientific_name' => ['required', 'string', 'unique:fish,scientific_name,' . $this->fish->id],
            'size' => ['required', 'min:0', 'numeric'],
            'longevity' => ['required', 'min:1', 'max:100', 'integer'],
            'description' => ['required', 'string'],
            'temper' => ['required'],
            'family_id' => ['required', 'exists:families,id'],
            'gender_id' => ['required', 'exists:genders,id'],
            'countries' => ['required', 'array'],
            'diets' => ['required', 'array']
        ];
    }
}
