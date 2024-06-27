@extends('layouts.main')

@section('title', 'PMElectric | Detail User')

@section('content')

<div class="col">
    <!-- Account details card-->
    <div class="card mb-4">
        <div class="card-header">Detail User</div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label class="small mb-1" for="inputUsername">Username</label>
                    <input class="form-control" id="inputUsername" type="text" value="{{ $data['username'] }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="small mb-1" for="inputNama">Nama</label>
                    <input class="form-control" id="inputNama" type="text" value="{{ $data['nama'] }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="small mb-1" for="inputRole">Role</label>
                    <input class="form-control" id="inputRole" type="text" value="{{ $data['role'] }}" readonly>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection