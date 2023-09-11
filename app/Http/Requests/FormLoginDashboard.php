<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormLoginDashboard extends FormRequest
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
            'nomor_whatsapp' => 'required|numeric|digits_between:10,13',
            'password' => 'required|min:8|max:16',
        ];
    }

    public function messages(): array
    {
        return [
            'nomor_whatsapp.required' => 'Nomor WhatsApp tidak boleh kosong',
            'nomor_whatsapp.numeric' => 'Nomor WhatsApp harus berupa angka',
            'nomor_whatsapp.digits_between' => 'Nomor WhatsApp minimal 10 digit dan maksimal 13 digit',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 8 karakter',
            'password.max' => 'Password maksimal 16 karakter',
        ];
    }
}
