<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormKonfirmasiPembayaran extends FormRequest
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
            'nama_bank' => 'required|string|min:2|max:255',
            'nomor_rekening' => 'required|numeric',
            'tanggal_transfer' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_rekening.required' => 'Nama rekening tidak boleh kosong',
            'nama_rekening.string' => 'Nama rekening harus berupa huruf',
            'nama_rekening.min' => 'Nama rekening minimal 3 karakter',
            'nama_rekening.max' => 'Nama rekening maksimal 255 karakter',
            'nama_bank.required' => 'Nama bank tidak boleh kosong',
            'nama_bank.string' => 'Nama bank harus berupa huruf',
            'nama_bank.min' => 'Nama bank minimal 2 karakter',
            'nama_bank.max' => 'Nama bank maksimal 255 karakter',
            'nomor_rekening.required' => 'Nomor rekening tidak boleh kosong',
            'nomor_rekening.numeric' => 'Nomor rekening harus berupa angka',
            'tanggal_transfer.required' => 'Tanggal transfer tidak boleh kosong',
            'tanggal_transfer.date' => 'Tanggal transfer harus berupa tanggal',
        ];
    }
}
