<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormHargaJual extends FormRequest
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
            'nama_rekening' => 'required|string|min:3|max:255',
            'nama_bank' => 'required|string|min:3|max:255',
            'nomor_rekening' => 'required|string|min:6|max:255',
            'harga_kode' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_rekening.required' => 'Nama pemilik rekening tidak boleh kosong',
            'nama_rekening.string' => 'Nama pemilik rekening harus berupa huruf',
            'nama_rekening.min' => 'Nama pemilik rekening minimal 3 karakter',
            'nama_rekening.max' => 'Nama pemilik rekening maksimal 255 karakter',
            'nama_bank.required' => 'Nama bank tidak boleh kosong',
            'nama_bank.string' => 'Nama bank harus berupa huruf',
            'nama_bank.min' => 'Nama bank minimal 3 karakter',
            'nama_bank.max' => 'Nama bank maksimal 255 karakter',
            'nomor_rekening.required' => 'Nomor rekening tidak boleh kosong',
            'nomor_rekening.string' => 'Nomor rekening harus berupa huruf',
            'nomor_rekening.min' => 'Nomor rekening minimal 6 karakter',
            'nomor_rekening.max' => 'Nomor rekening maksimal 255 karakter',
            'harga_kode.required' => 'Harga kode daftar tidak boleh kosong',
        ];
    }
}
