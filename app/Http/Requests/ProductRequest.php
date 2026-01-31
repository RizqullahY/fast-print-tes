<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_produk' => 'required|max:255',
            'kategori_id' => 'required|exists:kategori,id_kategori',
            'harga'       => 'required|numeric|min:0|max:999999999999.99',
            'status_id'   => 'sometimes|exists:status,id_status',
        ];
    }

    public function messages()
    {
        return [
            'nama_produk.required' => 'Nama produk wajib diisi',
            'nama_produk.max'      => 'Nama produk maksimal 255 karakter',

            'kategori_id.required' => 'Kategori wajib dipilih',
            'kategori_id.exists'   => 'Kategori tidak valid',

            'harga.required'       => 'Harga wajib diisi',
            'harga.numeric'        => 'Harga harus berupa angka',
            'harga.max'            => 'Harga maksimal 999.999.999.999,99',
            
            'status_id.exists'     => 'Status tidak valid',
        ];
    }

    protected function failedValidation($validator)
    {
        throw new \Illuminate\Http\Exceptions\HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors()
            ], 422)
        );
    }
}
