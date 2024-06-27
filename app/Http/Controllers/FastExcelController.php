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
        $collection = (new FastExcel)->import(storage_path('app/' . $path), function ($row) {
            return DataMonitoring::create([
                'id' => $row[0],
                'no_jo' => $row[1],
                'tgl_jo' => $row[2],
                'nama_project' => $row[3],
                'kode_gbj' => $row[4],
                'nilai_harga' => $row[5],
                'nama_panel' => $row[6],
                'tipe_jenis' => $row[7],
                'tipe_fswm' => $row[8],
                'qty_unit' => $row[9],
                'qty_cell' => $row[10],
                'warna' => $row[11],
                'nomor_wo' => $row[12],
                'nomor_seri' => $row[13],
                'size_panel_height' => $row[14],
                'size_panel_width' => $row[15],
                'size_panel_deep' => $row[16],
                'mh_std' => $row[17],
                'mh_aktual' => $row[18],
                'tgl_submit_dwg_for_approval' => $row[19],
                'tgl_approved' => $row[20],
                'tgl_release_dwg_softcopy' => $row[21],
                'tgl_release_dwg_hardcopy' => $row[22],
                'breakdown' => $row[23],
                'busbar' => $row[24],
                'target_ppc' => $row[25],
                'target_eng' => $row[26],
                'design_pic' => $row[27],
                'design_start' => $row[28],
                'design_end' => $row[29],
                'nesting_pic' => $row[30],
                'nesting_start' => $row[31],
                'nesting_end' => $row[32],
                'program_pic' => $row[33],
                'program_start' => $row[34],
                'program_end' => $row[35],
                'checker_pic' => $row[36],
                'checker_start' => $row[37],
                'checker_end' => $row[38],
                'tgl_box_selesai' => $row[39],
                'due_date' => $row[40],
                'tgl_terbit_wo' => $row[41],
                'plan_start_produksi' => $row[42],
                'aktual_start_produksi' => $row[43],
                'plan_fg_wo' => $row[44],
                'aktual_fg_wo' => $row[45],
                'progress' => $row[46],
                'desc_progress' => $row[47],
                'status' => $row[48],
                'delivery_no' => $row[49],
                'delivery_tgl' => $row[50],
                'keterangan' => $row[51],
            ]);
        });

        return redirect()->route('dataMonitoring.index')->with('alert', [
            'type' => 'success',
            'title' => 'Sukses',
            'message' => 'Data Monitoring berhasil diimpor.'
        ]);
    }
}
