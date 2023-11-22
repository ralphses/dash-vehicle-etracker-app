<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VehicleRegistrationRequest extends FormRequest
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
            'means_of_purchase' => ['required'],
            'vehicle_color' => ['required'],
            'vehicle_model' => ['required'],
            'vehicle_make' => ['required'],
            'phone_contact' => ['required'],
            'vehicle_type' =>  ['required'],
            'vehicle_registration_number' => ['required', Rule::unique('user_vehicles', 'vehicle_registration_number')],
            'email' => ['email'],
            'full_name' => ['required', 'regex:(\\w)']
        ];
    }
}
