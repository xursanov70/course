<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourseRequest extends FormRequest
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
            'course_name' => 'required|string',
            'category_id' => 'required|integer',
            'course_image' => 'required|file',
        ];
    }

    public function messages()
    {
        return [
            "course_name.required" => "kurs nomini kiriting",
            "course_name.string" => "kursni string holatida  kiriting",

            "category_id.required" => "category id raqami kiriting",
            "category_id.integer" => "category id raqamini integer holatida  kiriting",
            
            "course_image.required" => "kurs rasmini  kiriting",
            "course_image.string" => "kurs rasmini fayl holatida  kiriting",

        ];
    }
}
