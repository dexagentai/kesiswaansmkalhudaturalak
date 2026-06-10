@extends('layout')

@section('content')
<div class="no-print">
    <h2>Absensi Siswa</h2>
    <form action="/absensi" method="GET" class="mb-3 d-flex gap-2">
        <select name="kelas" class="form-control">
            <option value="">-- Pilih Kelas --</option>
            @foreach($kelasList as $k)
                <option value="{{ $k }}" {{ $kelas == $k ? 'selected' : '' }}>{{ $k }}</option>
            @endforeach
        </select>

        <select name="jurusan" class="form-control">
            <option value="">-- Pilih Jurusan --</option>
            @foreach($jurusanList as $j)
                <option value="{{ $j }}" {{ $jurusan == $j ? 'selected' : '' }}>{{ $j }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">Tampilkan</button>
    </form>
</div>

@if($kelas && $jurusan)
<div style="text-align:center; margin-bottom:10px;">
    <h3>YAYASAN AL HUDA TURALAK</h3>
    <h4>SEKOLAH MENENGAH KEJURUAN (SMK) AL HUDA TURALAK</h4>
    <p>Status Terakreditasi A<br>
    Jl. Raya Turalak No. 43 Turalak – Telp. (0265) 431043</p>
    <hr>
    <h4>DAFTAR HADIR PESERTA DIDIK</h4>
</div>

<table style="width:100%; margin-bottom:10px;">
    <tr>
        <td>Nama Guru :</td>
        <td>__________________________</td>
    </tr>
    <tr>
        <td>Mata Pelajaran :</td>
        <td>__________________________</td>
    </tr>
    <tr>
        <td>Kelas/Jurusan :</td>
        <td>{{ $kelas }} {{ $jurusan }}</td>
    </tr>
</table>

<table class="table table-bordered" style="font-size:13px;">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Peserta Didik</th>
            @for($i = 1; $i <= 31; $i++)
                <th>{{ $i }}</th>
            @endfor
        </tr>
    </thead>
    <tbody>
        @foreach($siswa as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nisn }}</td>
                <td>{{ $item->nama }}</td>
                @for($i = 1; $i <= 31; $i++)
                    <td></td>
                @endfor
            </tr>
        @endforeach
    </tbody>
</table>

<div style="margin-top:30px;">
    <table style="width:100%;">
        <tr>
            <td style="text-align:center;">
                Mengetahui,<br>
                Waka Kurikulum<br><br><br>
                ________________________
            </td>
            <td style="text-align:center;">
                Garut, __________ 2026<br>
                Guru Mapel<br><br><br>
                ________________________
            </td>
        </tr>
    </table>
</div>

{{-- Tombol Unduh Absensi --}}
<div class="no-print mt-3">
    <a href="{{ route('absensi.export', ['kelas' => $kelas, 'jurusan' => $jurusan]) }}" class="btn btn-success">
        Unduh Absensi (Excel)
    </a>
</div>
@endif
@endsection
