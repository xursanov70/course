<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            "username" => "required|max:30|regex:/^[A-Za-z0-9\-_]+$/",
            "password" => "required|min:5|max:30",
        ];
    }

        public function messages()
        {
            return [
                "username.required" => "username kiriting",
                "username.max" => "username 30 ta belgidan kam bo'lishi kerak",
                "username.regex" => "yaroqsiz username kiritildi",
                
                "password.required" => "parol kiriting",
                "password.min" => "parol 5 ta belgidan kam bo'lmasligi kerak",
                "password.max" => "parol 30 ta belgidan kam bo'lishi kerak",
            ];
        }
}
