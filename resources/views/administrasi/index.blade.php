@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="text-center mb-4">
        <h2 class="fw-bold text-success">Menu Administrasi</h2>
        <p class="text-muted">Dokumen administrasi sekolah yang siap diunduh.</p>
        <hr>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-success text-center">
            <tr>
                <th>Nama Dokumen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dokumen as $file)
                <tr>
                    <td>{{ $file['nama'] }}</td>
                    <td class="text-center">
                        <a href="{{ asset($file['path']) }}" class="btn btn-success btn-sm" download>
                            <i class="bi bi-download me-1"></i>Unduh
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <footer class="text-center text-muted mt-5">
        <small>© {{ date('Y') }} SMK AL HUDA TURALAK — Administrasi Sekolah</small>
    </footer>
</div>
@endsection
