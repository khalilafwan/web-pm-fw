<!-- resources/views/user.blade.php -->
@extends('layouts.main')

@section('title', 'PMElectric | User')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Manage User</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataUser" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Login</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->username }}</td>
                                <td>{{ $row->password }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->role }}</td>
                                
                                {{-- @if (auth()->user()->role == 'admin') --}}
                                    <td>
                                        <button type="button" class="btn btn-danger btn-circle btn-delete" data-toggle="modal" data-target="#deleteModal" data-id="{{ $row->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                {{-- @endif --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
