<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormNonaktifkanAkun extends FormRequest
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
            'nomor_telepon' => 'required|numeric|digits_between:10,13',
            'password' => 'required|min:8|max:16',
        ];
    }

    public function messages(): array
    {
        return [
            'nomor_telepon.required' => 'Nomor telepon tidak boleh kosong',
            'nomor_telepon.numeric' => 'Nomor telepon harus berupa angka',
            'nomor_telepon.digits_between' => 'Nomor telepon minimal 10 digit dan maksimal 13 digit',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 8 karakter',
            'password.max' => 'Password maksimal 16 karakter',
        ];
    }
}
