<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataMonitoring;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function getData()
    {
        $data = DB::select("SELECT MONTH(tgl_jo) as month, COUNT(*) as project_count FROM data_monitoring GROUP BY MONTH(tgl_jo)");
        return response()->json($data);
    }

    public function getDataPieChart()
    {
        $data = DB::select("SELECT tipe_fswm, COUNT(*) as jumlah FROM data_monitoring GROUP BY tipe_fswm");
        return response()->json($data);
    }

    public function index()
    {
        $total_pendapatan = DataMonitoring::getTotalPendapatan();
        return view('index', [
            'title' => 'Dashboard',
            'total_pendapatan' => $total_pendapatan
        ]);
    }
}
