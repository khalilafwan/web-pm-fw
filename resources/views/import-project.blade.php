@extends('layouts.main')

@section('PMElectric | Import Project')

<!-- Custom styles for import page-->
<link href="{{ asset('css/import.css') }}" rel="stylesheet">

@section('content')

<form method="POST" action="import_aksi.php" enctype="multipart/form-data">
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