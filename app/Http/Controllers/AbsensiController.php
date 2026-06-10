<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Exports\AbsensiExport;
use Maatwebsite\Excel\Facades\Excel;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $kelas = $request->input('kelas');
        $jurusan = $request->input('jurusan');
        $siswa = collect(); // gunakan collection kosong agar tidak error di view

        if ($kelas && $jurusan) {
            $siswa = Siswa::where('kelas_jurusan', $kelas . ' ' . $jurusan)
                          ->where('pangkalan', 'TRK') // filter pangkalan TRK
                          ->get();
        }

        $kelasList = ['X', 'XI', 'XII'];
        $jurusanList = ['TKJ', 'TKRO', 'LPS', 'MPLB', 'TF', 'DKV'];

        return view('absensi.index', compact('siswa', 'kelas', 'jurusan', 'kelasList', 'jurusanList'));
    }

    public function export(Request $request)
    {
        $kelas = $request->input('kelas');
        $jurusan = $request->input('jurusan');

        // Ambil data siswa sesuai filter
        $siswa = Siswa::where('kelas_jurusan', $kelas . ' ' . $jurusan)
                      ->where('pangkalan', 'TRK')
                      ->get();

        // Nama file otomatis sesuai kelas/jurusan
        $filename = 'absensi_' . $kelas . '_' . $jurusan . '.xlsx';

        // Unduh file Excel dengan data siswa
        return Excel::download(new AbsensiExport($siswa), $filename);
    }
}
