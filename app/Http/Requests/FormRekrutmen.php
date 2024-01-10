<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRekrutmen extends FormRequest
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

            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required|numeric',
            'pendidikan_terakhir' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'nomor_telepon' => 'required|numeric|unique:mitra,nomor_telepon|digits_between:10,13',
            'nomor_whatsapp' => 'required|numeric|unique:mitra,nomor_whatsapp|digits_between:10,13',
            'pekerjaan' => 'required|min:10',
            'dokumen_cv' => 'required|max:5120|image',
            'check1' => 'required',
            'check2' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama tidak boleh kosong',
            'jenis_kelamin.required' => 'Jenis kelamin tidak boleh kosong',
            'umur.required' => 'Umur tidak boleh kosong',
            'umur.numeric' => 'Umur harus berupa angka',
            'pendidikan_terakhir.required' => 'Pendidikan terakhir tidak boleh kosong',
            'provinsi.required' => 'Provinsi tidak boleh kosong',
            'kota.required' => 'Kota tidak boleh kosong',
            'nomor_telepon.required' => 'Nomor telepon tidak boleh kosong',
            'nomor_telepon.numeric' => 'Nomor telepon harus berupa angka',
            'nomor_telepon.unique' => 'Nomor telepon sudah terdaftar',
            'nomor_telepon.digits_between' => 'Nomor telepon minimal 10 digit dan maksimal 13 digit',
            'nomor_whatsapp.required' => 'Nomor WhatsApp tidak boleh kosong',
            'nomor_whatsapp.numeric' => 'Nomor WhatsApp harus berupa angka',
            'nomor_whatsapp.unique' => 'Nomor WhatsApp sudah terdaftar',
            'nomor_whatsapp.digits_between' => 'Nomor WhatsApp minimal 10 digit dan maksimal 13 digit',
            'pekerjaan.required' => 'Pekerjaan tidak boleh kosong',
            'pekerjaan.min' => 'Pekerjaan minimal 10 karakter',
            'dokumen_cv.required' => 'Foto KTP tidak boleh kosong',
            'dokumen_cv.max' => 'Foto KTP maksimal 5 MB',
            'dokumen_cv.image' => 'Foto KTP harus berupa gambar',
        ];
    }

    public function validate(): array
    {
        $validated = parent::validated();
        $validated['nomor_telepon'] = '0' . $validated['nomor_telepon'];
        $validated['nomor_whatsapp'] = '0' . $validated['nomor_whatsapp'];
        $validated['status_tahap'] = '1';
        $fileName = 'CV' . '_' . $validated['nama'] . '_' . $validated['nomor_whatsapp'] . '.' . $this->file('dokumen_cv')->extension();
        $validated['dokumen_cv'] = $this->file('dokumen_cv')->storeAs('Dokumen-CV', $fileName, 'public');
        return $validated;
    }
}
