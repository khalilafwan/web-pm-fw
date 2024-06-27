<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataMonitoring;
use Rap2hpoutre\FastExcel\FastExcel;

class FastExcelController extends Controller
{
    public function import(Request $request)
    {
        // Validate the request
        $request->validate([
            'excel_data' => 'required|file|mimes:xlsx'
        ]);

        // Handle the uploaded file
        $file = $request->file('excel_data');
        $path = $file->storeAs('imports', 'data.xlsx');

        // Import the data
        (new FastExcel)->import(storage_path('app/' . $path), function ($line) {
            return DataMonitoring::firstOrCreate(
                ['id' => $line['id']], // Assuming 'ID' is a unique identifier
                [
                    'no_jo' => $line['no_jo'],
                    'tgl_jo' => $line['tgl_jo'],
                    'nama_project' => $line['nama_project'],
                    'kode_gbj' => $line['kode_gbj'],
                    'nilai_harga' => $line['nilai_harga'],
                    'nama_panel' => $line['nama_panel'],
                    'tipe_jenis' => $line['tipe_jenis'],
                    'tipe_fswm' => $line['tipe_fswm'],
                    'qty_unit' => $line['qty_unit'],
                    'qty_cell' => $line['qty_cell'],
                    'warna' => $line['warna'],
                    'nomor_wo' => $line['nomor_wo'],
                    'nomor_seri' => $line['nomor_seri'],
                    'size_panel_height' => $line['size_panel_height'],
                    'size_panel_width' => $line['size_panel_width'],
                    'size_panel_deep' => $line['size_panel_deep'],
                    'mh_std' => $line['mh_std'],
                    'mh_aktual' => $line['mh_aktual'],
                    'tgl_submit_dwg_for_approval' => $line['tgl_submit_dwg_for_approval'],
                    'tgl_approved' => $line['tgl_approved'],
                    'tgl_release_dwg_softcopy' => $line['tgl_release_dwg_softcopy'],
                    'tgl_release_dwg_hardcopy' => $line['tgl_release_dwg_hardcopy'],
                    'breakdown' => $line['breakdown'],
                    'busbar' => $line['busbar'],
                    'target_ppc' => $line['target_ppc'],
                    'target_eng' => $line['target_eng'],
                    'design_pic' => $line['design_pic'],
                    'design_start' => $line['design_start'],
                    'design_end' => $line['design_end'],
                    'nesting_pic' => $line['nesting_pic'],
                    'nesting_start' => $line['nesting_start'],
                    'nesting_end' => $line['nesting_end'],
                    'program_pic' => $line['program_pic'],
                    'program_start' => $line['program_start'],
                    'program_end' => $line['program_end'],
                    'checker_pic' => $line['checker_pic'],
                    'checker_start' => $line['checker_start'],
                    'checker_end' => $line['checker_end'],
                    'tgl_box_selesai' => $line['tgl_box_selesai'],
                    'due_date' => $line['due_date'],
                    'tgl_terbit_wo' => $line['tgl_terbit_wo'],
                    'plan_start_produksi' => $line['plan_start_produksi'],
                    'aktual_start_produksi' => $line['aktual_start_produksi'],
                    'plan_fg_wo' => $line['plan_fg_wo'],
                    'aktual_fg_wo' => $line['aktual_fg_wo'],
                    'progress' => $line['progress'],
                    'desc_progress' => $line['desc_progress'],
                    'status' => $line['status'],
                    'delivery_no' => $line['delivery_no'],
                    'delivery_tgl' => $line['delivery_tgl'],
                    'keterangan' => $line['keterangan'],
                ]
            );
        });

        return redirect()->route('dataMonitoring.index')->with('alert', [
            'type' => 'success',
            'title' => 'Sukses',
            'message' => 'Data Monitoring berhasil diimpor.'
        ]);
    }
}
