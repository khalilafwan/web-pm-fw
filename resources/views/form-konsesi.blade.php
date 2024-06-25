<!-- resources/views/form-konsesi.blade.php -->
@extends('layouts.main')

@section('title', 'PMElectric | Input Data Konsesi')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Form Konsesi</h1>
<p class="mb-4">Mohon Isi Data Konsesi pada Form di Bawah ini.
</p>
@if(Session::has('alert'))
<script>
    Swal.fire({
            icon: '{{ Session::get('alert')['type'] }}',
            title: '{{ Session::get('alert')['title'] }}',
            text: '{{ Session::get('alert')['message'] }}',
            confirmButtonText: 'OK'
        }).then(function() {
            window.location.href = '{{ route('datakonsesi.index') }}';
        });
</script>
@endif

<form method="POST" action="{{ route('datakonsesi.store') }}">
    @csrf

    <div class="row">

        <!-- Border Left -->
        <div class="col-lg-6">

            <div class="card mb-4 py-3">
                <div class="card-body">
                    <label class="control-label col-sm-4">NO</label>
                    <div class="col-sm-8">
                        <input type="int" class="form-control" placeholder="Masukkan No" name="id" required>
                    </div>
                </div>
            </div>

            <div class="card mb-4 py-3">
                <div class="card-body">
                    <label class="control-label col-sm-4">JO</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Masukkan JO" name="jo" required>
                    </div>
                </div>
            </div>

            <div class="card mb-4 py-3">
                <div class="card-body">
                    <label class="control-label col-sm-4">WO</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Masukkan WO" name="wo" required>
                    </div>
                </div>
            </div>

            <div class="card mb-4 py-3">
                <div class="card-body">
                    <label class="control-label col-sm-4">Nama Project</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Masukkan Nama Project" name="nama_project" required>
                    </div>
                </div>
            </div>

            <div class="card mb-4 py-3">
                <div class="card-body">
                    <label class="control-label col-sm-4">Nama Panel</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Masukkan Nama Panel" name="nama_panel" required>
                    </div>
                </div>
            </div>

            <div class="card mb-4 py-3">
                <div class="card-body">
                    <label class="control-label col-sm-4">Unit</label>
                    <div class="col-sm-8">
                        <input type="int" class="form-control" placeholder="Masukkan Unit" name="unit" required>
                    </div>
                </div>
            </div>

            <div class="card mb-4 py-3">
                <div class="card-body">
                    <label class="control-label col-sm-4">Jenis</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Masukkan Jenis" name="jenis" required>
                    </div>
                </div>
            </div>

            <div class="card mb-4 py-3">
                <div class="card-body">
                    <label class="control-label col-sm-4">No RPB</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Masukkan No RPB" name="no_rpb" required>
                    </div>
                </div>
            </div>

            <div class="card mb-4 py-3">
                <div class="card-body">
                    <label class="control-label col-sm-4">NO PO</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Masukkan No PO" name="no_po" required>
                    </div>
                </div>
            </div>

        </div>



        <!-- Border Right -->
        <div class="col-lg-6">

            <div class="card mb-4 py-3">
                <div class="card-body">
                    <label class="control-label col-sm-4">Kode Material</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Masukkan Kode Material"
                            name="kode_material" required>
                    </div>
                </div>
            </div>

            <div class="card mb-4 py-3">
                <div class="card-body">
                    <label class="control-label col-sm-4">Konsesi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Masukkan Konsesi" name="konsesi" required>
                    </div>
                </div>
            </div>

            <div class="card mb-4 py-3">
                <div class="card-body">
                    <label class="control-label col-sm-4">Jml</label>
                    <div class="col-sm-8">
                        <input type="int" class="form-control" placeholder="Masukkan JML" name="jumlah" required>
                    </div>
                </div>
            </div>

            <div class="card mb-4 py-3">
                <div class="card-body">
                    <label class="control-label col-sm-4">NO LKPJ</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Masukkan No LKPJ" name="no_lkpj" required>
                    </div>
                </div>
            </div>

            <div class="card mb-4 py-3">
                <div class="card-body">
                    <label class="control-label col-sm-4">Status</label>
                    <div class="col-sm-8">
                        <select name="status" id="akses_id" class="form-control" required>
                            <option value="Open">Open</option>
                            <option value="Close">Close</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card mb-4 py-3">
                <div class="card-body">
                    <label class="control-label col-sm-4">TGL Matrial Datang</label>
                    <div class="col-sm-8">
                        <input type="date" class="date-end ml-5 form-control datepicker col-sm-8"
                            placeholder="Masukkan Tanggal Datang" name="tgl_matrial_dtg" required>
                    </div>
                </div>
            </div>

            <div class="card mb-4 py-3">
                <div class="card-body">
                    <label class="control-label col-sm-4">TGL Pasang</label>
                    <div class="col-sm-8">
                        <input type="date" class="date-end ml-5 form-control datepicker col-sm-8"
                            placeholder="Masukkan Tanggal Pasang" name="tgl_pasang" required>
                    </div>
                </div>
            </div>

            <div class="card mb-4 py-3">
                <div class="card-body">
                    <label class="control-label col-sm-4">Keterangan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Masukkan Keterangan" name="keterangan" required>
                    </div>
                </div>
            </div>


        </div>

    </div>

    <div class="text-center">
        <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light"
            id="btn-submit">Simpan</button>
    </div>
    <input type="hidden" name="action" id="action" value="event_dialog_add_newpartnerdata" />
</form>

@endsection