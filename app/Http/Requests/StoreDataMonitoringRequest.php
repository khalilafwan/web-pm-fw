<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDataMonitoringRequest extends FormRequest
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
            'no_jo' => 'nullable|string',
            'tgl_jo' => 'nullable|date',
            'nama_project' => 'nullable|string',
            'kode_gbj' => 'nullable|string',
            'nilai_harga' => 'nullable|numeric',
            'nama_panel' => 'nullable|string',
            'tipe_jenis' => 'nullable|string',
            'tipe_fswm' => 'nullable|string',
            'qty_unit' => 'nullable|integer',
            'qty_cell' => 'nullable|integer',
            'nomor_wo' => 'nullable|string',
            'nomor_seri' => 'nullable|string',
            'warna' => 'nullable|string',
            'size_panel_height' => 'nullable|numeric',
            'size_panel_width' => 'nullable|numeric',
            'size_panel_deep' => 'nullable|numeric',
            'mh_std' => 'nullable|date',
            'mh_aktual' => 'nullable|date',
            'tgl_submit_dwg_for_approval' => 'nullable|date',
            'tgl_approved' => 'nullable|date',
            'tgl_release_dwg_softcopy' => 'nullable|date',
            'tgl_release_dwg_hardcopy' => 'nullable|date',
            'breakdown' => 'nullable|date',
            'busbar' => 'nullable|date',
            'target_ppc' => 'nullable|date',
            'target_eng' => 'nullable|date',
            'tgl_box_selesai' => 'nullable|date',
            'due_date' => 'nullable|date',
            'tgl_terbit_wo' => 'nullable|date',
            'plan_start_produksi' => 'nullable|date',
            'aktual_start_produksi' => 'nullable|date',
            'plan_fg_wo' => 'nullable|date',
            'aktual_fg_wo' => 'nullable|date',
            'progress' => 'nullable|numeric',
            'desc_progress' => 'nullable|string',
            'status' => 'nullable|string',
            'delivery_no' => 'nullable|integer',
            'delivery_tgl' => 'nullable|date',
            'keterangan'=> 'nullable|string',
        ];
    }
}
