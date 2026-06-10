@extends('layout')

@section('content')
<h2>Koreksi Data Siswa</h2>
<form action="/siswa/{{ $siswa->id }}/koreksi" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama Siswa</label>
        <input type="text" value="{{ $siswa->nama }}" class="form-control" readonly>
    </div>
    <div class="mb-3">
        <label>Komentar Koreksi</label>
        <textarea name="isi_komentar" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Kirim Koreksi</button>
</form>
@endsection
