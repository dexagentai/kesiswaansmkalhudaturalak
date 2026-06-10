@extends('layout')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Siswa</h2>
    <div class="d-flex">
        <a href="/siswa/create" class="btn btn-primary me-2">Tambah Siswa</a>
        <a href="{{ route('siswa.export', ['filter' => $filter]) }}" class="btn btn-success">Unduh Excel</a>
    </div>
</div>

{{-- Filter dropdown --}}
<form method="GET" action="/siswa" class="mb-3 d-flex align-items-center">
    <label class="me-2"><strong>Filter:</strong></label>
    <select name="filter" class="form-select w-auto me-2" onchange="this.form.submit()">
        <option value="All" {{ $filter == 'All' ? 'selected' : '' }}>Semua</option>
        <option value="Turalak" {{ $filter == 'Turalak' ? 'selected' : '' }}>Turalak (TRK)</option>
        <option value="KelasJauh" {{ $filter == 'KelasJauh' ? 'selected' : '' }}>Kelas Jauh (Non‑TRK)</option>
    </select>
</form>

@php
    $grouped = $siswa->groupBy('kelas_jurusan');
@endphp

@foreach($grouped as $kelas => $list)
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <strong>{{ $kelas }}</strong>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>JK</th>
                        <th>Alamat</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Pangkalan</th>
                        <th class="no-print">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nisn }}</td>
                            <td>{{ $item->jk }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->tempat_lahir }}</td>
                            <td>{{ $item->tanggal_lahir }}</td>
                            <td>{{ $item->pangkalan }}</td>
                            <td class="no-print">
                                <a href="/siswa/{{ $item->id }}/koreksi" class="btn btn-warning btn-sm">Koreksi Data</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endforeach

@endsection
