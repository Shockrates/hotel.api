<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomSearchRequest extends FormRequest
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
            'city' => 'string|max:255',
            'type_id' => 'integer|nullable',
            'check_in_date' => 'required|date|after:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'min_price' => 'integer|nullable',
            'max_price' => 'integer|nullable',
            "count_of_guest" => 'integer|nullable',
            'parking' => 'numeric',
            'wifi' => 'boolean',
            'pet_friendly' => 'numeric',
            
        ];
    }

    
}
