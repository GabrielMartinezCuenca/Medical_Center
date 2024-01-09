<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'name' => 'required|min:2',
            'lastname' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'information' => 'nullable',
            'phone' => 'numeric|nullable',
            'professional_license'=>'required|min:5',
            'scholarship'=>'required|min:5',
            'consulting_room' => 'numeric|nullable',
            'medical_especiality_id' => 'nullable|numeric',
        ];
    }
}
