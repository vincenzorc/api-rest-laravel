<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAquariumRequest extends FormRequest
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
            'fish_id' => ['required', 'integer', 'exists:fish,id'],
            'temperature' => ['required', 'numeric'],
            'ph_min' => ['required', 'numeric', 'lt:ph_max'],
            'ph_max' => ['required', 'numeric', 'gt:ph_min'],
            'gh_min' => ['required', 'numeric', 'lt:gh_max'],
            'gh_max' => ['required', 'numeric', 'gt:gh_min'],
            'capacity' => ['required', 'integer', 'min:1']
        ];
    }
}
