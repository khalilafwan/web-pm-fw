<!-- resources/views/konsesi.blade.php -->
@extends('layouts.main')

@section('title', 'PMElectric | Konsesi')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Konsesi Project</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
        DataTables documentation</a>.</p>

<!-- DataTables -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Konsesi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataKonsesi" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Konsesi</th>
                        <th>JO</th>
                        <th>WO</th>
                        <th>Nama Project</th>
                        <th>Nama Panel</th>
                        <th>Unit</th>
                        <th>Jenis</th>
                        <th>NO RPB</th>
                        <th>NO PO</th>
                        <th>Kode Material</th>
                        <th>Konsesi</th>
                        <th>Jumlah</th>
                        <th>NO LKPJ</th>
                        <th>Status</th>
                        <th>TGL Matrial Dtg</th>
                        <th>TGL Pasang</th>
                        <th>Keterangan</th>
                        @if (auth()->user()->role == 'admin')
                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($konsesi as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->jo }}</td>
                        <td>{{ $row->wo }}</td>
                        <td>{{ $row->nama_project }}</td>
                        <td>{{ $row->nama_panel }}</td>
                        <td>{{ $row->unit }}</td>
                        <td>{{ $row->jenis }}</td>
                        <td>{{ $row->no_rpb }}</td>
                        <td>{{ $row->no_po }}</td>
                        <td>{{ $row->kode_material }}</td>
                        <td>{{ $row->konsesi }}</td>
                        <td>{{ $row->jumlah }}</td>
                        <td>{{ $row->no_lkpj }}</td>
                        <td>{{ $row->status }}</td>
                        <td>{{ $row->tgl_matrial_dtg }}</td>
                        <td>{{ $row->tgl_pasang }}</td>
                        <td>{{ $row->keterangan }}</td>
                        @if (auth()->user()->role == 'admin')
                        <td>
                            <button type="button" class="btn btn-danger btn-circle btn-delete" data-toggle="modal"
                                data-target="#deleteModal" data-id="{{ $row->id_konsesi }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection