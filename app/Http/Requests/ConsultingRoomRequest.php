<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultingRoomRequest extends FormRequest
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
            'name' => 'required|min:2|max:100',
            'location' => 'nullable',
            'phone' => 'numeric', 'nullable',
            'especiality' => 'nullable',
            'schedule_start' => 'nullable',
            'schedule_end' => 'nullable',
            'services' => 'nullable',
            'email'=>'nullable','email',
            'information' => 'nullable'
        ];
    }
}
