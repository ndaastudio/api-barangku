<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormEditPassword extends FormRequest
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
            'password_lama' => 'required|min:8|max:255',
            'password_baru_confirmation' => 'required|min:8|max:255',
            'password_baru' => 'required|min:8|max:255|confirmed',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'password_lama.required' => 'Password lama tidak boleh kosong',
            'password_lama.min' => 'Password lama minimal 8 karakter',
            'password_lama.max' => 'Password lama maksimal 255 karakter',
            'password_baru_confirmation.required' => 'Konfirmasi password baru tidak boleh kosong',
            'password_baru_confirmation.min' => 'Konfirmasi password baru minimal 8 karakter',
            'password_baru_confirmation.max' => 'Konfirmasi password baru maksimal 255 karakter',
            'password_baru.required' => 'Password baru tidak boleh kosong',
            'password_baru.min' => 'Password baru minimal 8 karakter',
            'password_baru.max' => 'Password baru maksimal 255 karakter',
            'password_baru.confirmed' => 'Konfirmasi password baru tidak cocok dengan password baru',
        ];
    }
}
