<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataRequest extends FormRequest
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
            'name_en' => 'required|string|max:255',
            'name_ku' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'price_en' => 'required|numeric',
            'price_ku' => 'required|numeric',
            'price_ar' => 'required|numeric',
            'description_en' => 'required|string',
            'description_ku' => 'required|string',
            'description_ar' => 'required|string',
            'location_en' => 'required|string',
            'location_ku' => 'required|string',
            'location_ar' => 'required|string',
            'state' => 'required|string|in:active,inactive',
        ];
    }
}
