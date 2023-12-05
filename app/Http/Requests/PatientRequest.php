<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'name' => 'required|min:3|max:200',
            'lastname' => 'required|min:3|max:200',
            'born_date' => 'date|nullable',
            'avenue' => 'nullable',
            'number' => 'nullable|integer',
            'city' => 'nullable',
            'region' => 'nullable',
            'information' => 'nullable',
        ];
    }
}
