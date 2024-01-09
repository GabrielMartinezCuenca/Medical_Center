<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeInformationPatientRequest extends FormRequest
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
            'name' => 'required|min:5',
                'lastname' => 'required',
                'born_date' => 'date|required',
                'weight' => 'nullable|numeric',
                'height' => 'nullable|numeric',
                'gender' => 'nullable',
                'temperature' => 'nullable|numeric',
                'blood_pressure' =>'nullable',
        ];
    }
}
