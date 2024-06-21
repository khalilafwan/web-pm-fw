<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDataKonsesiRequest extends FormRequest
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
            'id' => 'required|integer',
            'jo' => 'nullable|string',
            'wo' => 'nullable|string',
            'nama_project' => 'nullable|string',
            'nama_panel' => 'nullable|string',
            'unit' => 'nullable|integer',
            'jenis' => 'nullable|string',
            'no_rpb' => 'nullable|string',
            'no_po' => 'nullable|string',
            'kode_material' => 'nullable|string',
            'konsesi' => 'nullable|string',
            'jumlah' => 'nullable|integer',
            'no_lkpj' => 'nullable|string',
            'status' => 'nullable|string',
            'tgl_matrial_dtg' => 'nullable|date',
            'tgl_pasang' => 'nullable|date',
            'keterangan' => 'nullable|string',
        ];
    }
}
