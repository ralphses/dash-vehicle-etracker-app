<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewParkingSpaceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'type' => 'required|in:car,tricycle,motorcycle',
            'size' => 'required|numeric|between:0.01,9999.99',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than :max characters.',
            'type.required' => 'The type field is required.',
            'type.in' => 'The selected type is invalid.',
            'size.required' => 'The size field is required.',
            'size.numeric' => 'The size must be a number.',
            'size.between' => 'The size must be between :min and :max.',
        ];
    }
}
