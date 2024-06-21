<?php

namespace App\Http\Controllers;

use App\Models\DataKonsesi;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataKonsesiRequest;
use App\Http\Requests\UpdateDataKonsesiRequest;
use Illuminate\Support\Facades\Log;

class DataKonsesiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konsesi = DataKonsesi::all();
        $err = session('err'); // Assuming error message is stored in session
        $title = "Konsesi";
        return view('konsesi', compact('konsesi', 'err', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Input Data Konsesi";
        return view('form-konsesi', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDataKonsesiRequest $request)
    {
        // Validasi data dari request
        $validated = $request->validated();

        // Simpan data ke database
        $dataKonsesi = new DataKonsesi();
        $dataKonsesi->id = $validated['id'];
        $dataKonsesi->jo = $validated['jo'];
        $dataKonsesi->wo = $validated['wo'];
        $dataKonsesi->nama_project = $validated['nama_project'];
        $dataKonsesi->nama_panel = $validated['nama_panel'];
        $dataKonsesi->unit = $validated['unit'];
        $dataKonsesi->jenis = $validated['jenis'];
        $dataKonsesi->no_rpb = $validated['no_rpb'];
        $dataKonsesi->no_po = $validated['no_po'];
        $dataKonsesi->kode_material = $validated['kode_material'];
        $dataKonsesi->konsesi = $validated['konsesi'];
        $dataKonsesi->jumlah = $validated['jumlah'];
        $dataKonsesi->no_lkpj = $validated['no_lkpj'];
        $dataKonsesi->status = $validated['status'];
        $dataKonsesi->tgl_matrial_dtg = $validated['tgl_matrial_dtg'];
        $dataKonsesi->tgl_pasang = $validated['tgl_pasang'];
        $dataKonsesi->keterangan = $validated['keterangan'];
        $dataKonsesi->save();

        // Set alert untuk sukses
        return redirect()->route('datakonsesi.create')->with('alert', [
            'type' => 'success',
            'title' => 'Sukses',
            'message' => 'Data Konsesi berhasil disimpan.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(DataKonsesi $dataKonsesi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataKonsesi $dataKonsesi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataKonsesiRequest $request, DataKonsesi $dataKonsesi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataKonsesi $dataKonsesi)
    {
        //
    }
}
