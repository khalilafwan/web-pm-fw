@extends('layouts.main')

@section('title', 'PMElectric | Input Data Nesting')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Form Nesting</h1>
<p class="mb-4">Mohon Isi Data Nesting pada Form di Bawah ini.
</p>

<!-- Menampilkan alert jika ada -->
@if(session('alert'))
<div class="alert alert-{{ session('alert.type') }} alert-dismissible fade show" role="alert">
    <strong>{{ session('alert.title') }}</strong> {{ session('alert.message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<form method="POST"
    action="{{ route('dataMonitoring.update', ['dataMonitoring' => $dataMonitoring->id, 'formType' => $formType]) }}">
    @csrf
    @method('PUT')

    <!-- Include formType as hidden input -->
    <input type="hidden" name="formType" value={{ $formType }}>
    <input type="hidden" name="dataMonitoring_id" value="{{ $dataMonitoring->id }}">

    <div class="row">

        <!-- Border Left -->
        <div class="col-lg-6">

            <div class="card mb-4 py-3">
                <div class="card-body">
                    <label class="control-label col-sm-4" for="id">ID Project</label>
                    <div class="col-sm-8">
                        <select name="dataMonitoring_id" id="statdrop"
                            class="date-end ml-5 form-control datepicker col-sm-8">
                            @foreach($projectIds as $projectId)
                            <option value="{{ $projectId }}" {{ $projectId==$dataMonitoring->id ? 'selected' : '' }}>
                                {{ $projectId }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class=" card mb-4 py-3">
                <div class="card-body">
                    <label class="control-label col-sm-4">ID PIC</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Masukkan PIC" name="nesting_pic">
                    </div>
                </div>
            </div>

        </div>

        <!-- Border Right -->
        <div class="col-lg-6">

            <div class="card mb-4 py-3">
                <div class="card-body">
                    <label class="control-label col-sm-4">START</label>
                    <div class="col-sm-8">
                        <input type="date" class="date-end ml-5 form-control datepicker col-sm-8"
                            placeholder="Masukan Waktu Start" name="nesting_start">
                    </div>
                </div>
            </div>

            <div class="card mb-4 py-3">
                <div class="card-body">
                    <label class="control-label col-sm-4">END</label>
                    <div class="col-sm-8">
                        <input type="date" class="date-end ml-5 form-control datepicker col-sm-8"
                            placeholder="Masukan Waktu End" name="nesting_end">
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