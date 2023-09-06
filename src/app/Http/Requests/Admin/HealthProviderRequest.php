<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class HealthProviderRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users|min:11|max:11',
            'date_of_birth' => 'required',
            'username' => 'required',
            'gender' => 'required',
            "specialization" => 'required',
            'address' => 'required',
            'qualifications' => 'sometimes',
            'consultation_fee' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => "Email is already exist"
        ];
    }
}
