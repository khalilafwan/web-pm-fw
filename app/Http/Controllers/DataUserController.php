<?php

namespace App\Http\Controllers;

use App\Models\DataUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataUserRequest;
use App\Http\Requests\UpdateDataUserRequest;
use Illuminate\Support\Facades\Log;

class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = DataUser::all();
        $err = session('err'); // Assuming error message is stored in session
        $title = "User";
        return view('user', compact('user', 'err', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Input Data User";
        return view('register', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDataUserRequest $request)
    {
        // Validasi data dari request
        $validated = $request->validated();

        // Simpan data ke database
        $dataUser = new DataUser();
        $dataUser->id = $validated['id'];
        $dataUser->username = $validated['username'];
        $dataUser->password = $validated['password'];
        $dataUser->nama = $validated['nama'];
        $dataUser->role = $validated['role'];
        $dataUser->save();

        // Set alert untuk sukses
        return redirect()->route('datauser.create')->with('alert', [
            'type' => 'success',
            'title' => 'Sukses',
            'message' => 'Data User berhasil disimpan.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(DataUser $dataUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataUser $dataUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataUserRequest $request, DataUser $dataUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataUser $dataUser)
    {
        //
    }
}