@extends('layouts.main')

@section('PMElectric | Import Project')

<!-- Custom styles for import page-->
<link href="{{ asset('css/import.css') }}" rel="stylesheet">

@section('content')

<!-- Menampilkan alert jika ada -->
@if(Session::has('alert'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        Swal.fire({
            icon: '{{ Session::get('alert.type') }}',
            title: '{{ Session::get('alert.title') }}',
            text: '{{ Session::get('alert.message') }}',
            confirmButtonText: 'OK'
        }).then(function() {
            window.location.href = '{{ route('dataMonitoring.index') }}';
        });
    });
</script>
@endif

<form method="POST" aaction="{{ url('/import-project') }}" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <hr>

        <label for="excel" class="drop-container" id="dropcontainer">
            <span class="drop-title">Letakkan File Disini</span>
            or
            <input type="file" id="excel" name="excel_data" accept=".xlsx" required>
        </label><br>
        <button type="submit" name="submit" class="inputbtn">Import</button>
    </div>
</form>

@endsection