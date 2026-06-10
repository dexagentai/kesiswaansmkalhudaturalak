@extends('layout')

@section('content')
<div class="container mt-4">
    {{-- Header --}}
    <div class="text-center mb-4">
        <h2 class="fw-bold text-success">Dashboard Kesiswaan</h2>
        <p class="text-muted">Sistem Data & Absensi SMK AL HUDA TURALAK</p>
        <hr>
    </div>

    {{-- Statistik ringkas --}}
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm border-0" style="background-color:#f1f8e9;">
                <div class="card-body text-center">
                    <h6 class="text-secondary">Total Siswa</h6>
                    <h3 class="fw-bold text-success">{{ $totalSiswa }}</h3>
                    <i class="bi bi-people-fill text-success fs-3"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0" style="background-color:#f1f8e9;">
                <div class="card-body text-center">
                    <h6 class="text-secondary">Siswa TRK</h6>
                    <h3 class="fw-bold text-success">{{ $totalTRK }}</h3>
                    <i class="bi bi-person-fill text-success fs-3"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0" style="background-color:#f1f8e9;">
                <div class="card-body text-center">
                    <h6 class="text-secondary">Jurusan</h6>
                    <h3 class="fw-bold text-success">6</h3>
                    <i class="bi bi-building text-success fs-3"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0" style="background-color:#f1f8e9;">
                <div class="card-body text-center">
                    <h6 class="text-secondary">Total Kelas</h6>
                    <h3 class="fw-bold text-success">19</h3>
                    <i class="bi bi-journal-bookmark text-success fs-3"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Grafik jumlah siswa per jurusan --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h5 class="fw-bold text-success mb-3">Grafik Jumlah Siswa per Jurusan</h5>
            <canvas id="chartJurusan"></canvas>
        </div>
    </div>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <h5 class="fw-bold text-success mb-3">Daftar Jurusan & Kelas (Siswa Turalak)</h5>
        <p class="text-muted">Data berikut hanya menampilkan jumlah siswa dengan pangkalan TRK (Turalak).</p>

        @php
            $jurusanList = ['LPS','MPLB','DKV','TKJ','TKRO','TF'];
        @endphp

        <table class="table table-bordered text-center">
            <thead class="table-success">
                <tr>
                    <th>Jurusan</th>
                    <th>Kelas X</th>
                    <th>Kelas XI</th>
                    <th>Kelas XII</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jurusanList as $jurusan)
                    @php
                        $xCount = \App\Models\Siswa::where('pangkalan','TRK')->where('kelas_jurusan','X '.$jurusan)->count();
                        $xiCount = \App\Models\Siswa::where('pangkalan','TRK')->where('kelas_jurusan','XI '.$jurusan)->count();
                        $xiiCount = \App\Models\Siswa::where('pangkalan','TRK')->where('kelas_jurusan','XII '.$jurusan)->count();
                    @endphp
                    <tr>
                        <td>{{ $jurusan }}</td>
                        <td>{{ $xCount }}</td>
                        <td>{{ $xiCount }}</td>
                        <td>{{ $xiiCount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    {{-- Footer --}}
    <footer class="text-center text-muted mt-4">
        <small>© 2026 SMK AL HUDA TURALAK — Sistem Kesiswaan Terintegrasi</small>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartJurusan');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($kelasList->pluck('kelas_jurusan')),
        datasets: [{
            label: 'Jumlah Siswa',
            data: @json($kelasList->map(fn($k) => \App\Models\Siswa::where('kelas_jurusan', $k->kelas_jurusan)->count())),
            backgroundColor: '#43a047'
        }]
    },
    options: {
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true } }
    }
});
</script>
@endsection
