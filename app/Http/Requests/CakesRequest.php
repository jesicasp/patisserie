<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CakesRequest extends FormRequest
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
            'cake_name' => 'required|string|max:255', 
            'image' => 'nullable|image|max:2048', 
            'price' => 'required|numeric|between:0,999999.99', 
            'cake_description' => 'required|string|max:65535',
        ];
    }
}
