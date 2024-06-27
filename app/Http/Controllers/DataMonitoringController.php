<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\DataMonitoring;
use App\Http\Requests\StoreDataMonitoringRequest;
use App\Http\Requests\UpdateDataMonitoringRequest;

class DataMonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $monitoring = DataMonitoring::all();
        $err = session('err'); // Assuming error message is stored in session
        $title = "Monitoring";
        return view('monitoring', compact('monitoring', 'err', 'title'));
    }

    /**
     * Show the data for chart.js.
     */
    public function getData()
    {
        global $conn;
        $data = [];
        $query = mysqli_query($conn, "SELECT MONTH(tgl_jo) as month, COUNT(*) as project_count FROM data_monitoring GROUP BY MONTH(tgl_jo)");

        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        echo json_encode($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Input Data Monitoring";
        return view('form-project', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDataMonitoringRequest $request)
    {
        // Validasi data dari request
        $validated = $request->validated();

        // Simpan data ke database
        $dataMonitoring = new DataMonitoring();

        $dataMonitoring->id = $validated['id'];
        $dataMonitoring->no_jo = $validated['no_jo'];
        $dataMonitoring->tgl_jo = $validated['tgl_jo'];
        $dataMonitoring->nama_project = $validated['nama_project'];
        $dataMonitoring->kode_gbj = $validated['kode_gbj'];
        $dataMonitoring->nilai_harga = $validated['nilai_harga'];
        $dataMonitoring->nama_panel = $validated['nama_panel'];
        $dataMonitoring->tipe_jenis = $validated['tipe_jenis'];
        $dataMonitoring->tipe_fswm = $validated['tipe_fswm'];
        $dataMonitoring->qty_unit = $validated['qty_unit'];
        $dataMonitoring->qty_cell = $validated['qty_cell'];
        $dataMonitoring->nomor_wo = $validated['nomor_wo'];
        $dataMonitoring->nomor_seri = $validated['nomor_seri'];
        $dataMonitoring->warna = $validated['warna'];
        $dataMonitoring->size_panel_height = $validated['size_panel_height'];
        $dataMonitoring->size_panel_width = $validated['size_panel_width'];
        $dataMonitoring->size_panel_deep = $validated['size_panel_deep'];
        $dataMonitoring->mh_std = $validated['mh_std'];
        $dataMonitoring->mh_aktual = $validated['mh_aktual'];
        $dataMonitoring->tgl_submit_dwg_for_approval = $validated['tgl_submit_dwg_for_approval'];
        $dataMonitoring->tgl_approved = $validated['tgl_approved'];
        $dataMonitoring->tgl_release_dwg_softcopy = $validated['tgl_release_dwg_softcopy'];
        $dataMonitoring->tgl_release_dwg_hardcopy = $validated['tgl_release_dwg_hardcopy'];
        $dataMonitoring->breakdown = $validated['breakdown'];
        $dataMonitoring->busbar = $validated['busbar'];
        $dataMonitoring->target_ppc = $validated['target_ppc'];
        $dataMonitoring->target_eng = $validated['target_eng'];
        $dataMonitoring->tgl_box_selesai = $validated['tgl_box_selesai'];
        $dataMonitoring->due_date = $validated['due_date'];
        $dataMonitoring->tgl_terbit_wo = $validated['tgl_terbit_wo'];
        $dataMonitoring->plan_start_produksi = $validated['plan_start_produksi'];
        $dataMonitoring->aktual_start_produksi = $validated['aktual_start_produksi'];
        $dataMonitoring->plan_fg_wo = $validated['plan_fg_wo'];
        $dataMonitoring->aktual_fg_wo = $validated['aktual_fg_wo'];
        $dataMonitoring->progress = $validated['progress'];
        $dataMonitoring->desc_progress = $validated['desc_progress'];
        $dataMonitoring->status = $validated['status'];
        $dataMonitoring->delivery_no = $validated['delivery_no'];
        $dataMonitoring->delivery_tgl = $validated['delivery_tgl'];
        $dataMonitoring->keterangan = $validated['keterangan'];
        $dataMonitoring->save();

        // Set alert untuk sukses
        return redirect()->route('datamonitoring.create')->with('alert', [
            'type' => 'success',
            'title' => 'Sukses',
            'message' => 'Data Monitoring berhasil disimpan.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(DataMonitoring $dataMonitoring)
    {
        //
    }

    /**
     * Get Project ID for Update Data.
     */
    public function getProjectIds()
    {
        // Contoh implementasi, sesuaikan dengan logika aplikasi Anda
        return DataMonitoring::pluck('id')->toArray();
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataMonitoring $dataMonitoring, $formType)
    {
        $title = ''; // Default kosong, bisa diubah sesuai kebutuhan
        $projectIds = $this->getProjectIds(); // Implementasikan fungsi ini untuk mengambil ID project
        switch ($formType) {
            case 'design':
                $title = 'Input Design';
                return view('form-design', compact('dataMonitoring', 'projectIds', 'title', 'formType'));
            case 'nesting':
                $title = 'Input Nesting';
                return view('form-nesting', compact('dataMonitoring', 'projectIds', 'title', 'formType'));
            case 'program':
                $title = 'Input Program';
                return view('form-program', compact('dataMonitoring', 'projectIds', 'title', 'formType'));
            case 'checker':
                $title = 'Input Checker';
                return view('form-checker', compact('dataMonitoring', 'projectIds', 'title', 'formType'));
            default:
                abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataMonitoringRequest $request, DataMonitoring $dataMonitoring, $formType = null)
    {
        // Validasi data dari request
        $validated = $request->validated();

        // Get formType from request if not provided in route
        if (!$formType) {
            $formType = $request->input('formType');
        }

        // // Update the project ID
        // $dataMonitoring->id = $validated['id'];

        // Ensure we use the correct DataMonitoring instance
        $dataMonitoring = DataMonitoring::findOrFail($validated['dataMonitoring_id']);

        switch ($formType) {
            case 'design':
                $dataMonitoring->design_pic = $validated['design_pic'];
                $dataMonitoring->design_start = $validated['design_start'];
                $dataMonitoring->design_end = $validated['design_end'];
                break;
            case 'nesting':
                $dataMonitoring->nesting_pic = $validated['nesting_pic'];
                $dataMonitoring->nesting_start = $validated['nesting_start'];
                $dataMonitoring->nesting_end = $validated['nesting_end'];
                break;
            case 'program':
                $dataMonitoring->program_pic = $validated['program_pic'];
                $dataMonitoring->program_start = $validated['program_start'];
                $dataMonitoring->program_end = $validated['program_end'];
                break;
            case 'checker':
                $dataMonitoring->checker_pic = $validated['checker_pic'];
                $dataMonitoring->checker_start = $validated['checker_start'];
                $dataMonitoring->checker_end = $validated['checker_end'];
                break;
            default:
                abort(404, 'Form type not recognized.');
        }

        // Simpan Data
        $dataMonitoring->save();

        // Set alert untuk sukses
        return redirect()->route('dataMonitoring.index')->with('alert', [
            'type' => 'success',
            'title' => 'Sukses',
            'message' => 'Data Monitoring berhasil disimpan.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $dataMonitoring = DataMonitoring::findOrFail($id);
            $dataMonitoring->delete();

            return redirect()->route('dataMonitoring.index')->with('alert', [
                'type' => 'success',
                'title' => 'Sukses',
                'message' => 'Data Monitoring berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            // Handle exception if record not found or other issues
            return redirect()->route('dataMonitoring.index')->with('alert', [
                'type' => 'error',
                'title' => 'Error',
                'message' => 'Gagal menghapus data Monitoring: ' . $e->getMessage()
            ]);
        }
    }
}
