<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLessonRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'course_id' => 'required|integer',
            'video' => 'required|file',
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "video darslik mavzusi kiriting",
            "title.string" => "video darslik mavzusini string holatida kiriting",

            "description.required" => "video darslik tavsifi kiriting",
            "description.string" => "video darslik tavsifini string holatida kiriting",

            "course_id.required" => "course id raqamini kiriting",
            "course_id.integer" => "course id raqamini string holatida kiriting",
            
            "video.required" => "video kiriting",
            "video.file" => "videoni fayl holatida kiriting",
        ];
    }
}
