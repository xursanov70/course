<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'category_name' => 'required|string',
            'category_image' => 'required|file',
        ];
    }

    public function messages()
    {
        return [
            "category_name.required" => "categoya nomini  kiriting",
            "category_name.string" => "categoyani string holatida  kiriting",
            
            "category_image.required" => "categoya rasmini  kiriting",
            "category_image.string" => "categoya rasmini fayl holatida  kiriting",

        ];
    }
}
