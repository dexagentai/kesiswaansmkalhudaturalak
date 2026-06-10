<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter'); // nilai: Turalak, KelasJauh, atau All

        if ($filter === 'Turalak') {
            $siswa = Siswa::where('pangkalan', 'TRK')->get();
        } elseif ($filter === 'KelasJauh') {
            $siswa = Siswa::where('pangkalan', '!=', 'TRK')->get();
        } else {
            $siswa = Siswa::all();
        }

        return view('siswa.index', compact('siswa', 'filter'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        Siswa::create($request->all());
        return redirect('/siswa')->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function formKoreksi($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.koreksi', compact('siswa'));
    }

    public function simpanKoreksi(Request $request, $id)
    {
        $request->validate([
            'isi_komentar' => 'required|string|max:255',
        ]);

        \DB::table('komentar')->insert([
            'id_siswa' => $id,
            'isi_komentar' => $request->isi_komentar,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/siswa')->with('success', 'Koreksi data berhasil dikirim');
    }

    public function export(Request $request)
    {
        $filter = $request->input('filter');

        if ($filter === 'Turalak') {
            $query = Siswa::where('pangkalan', 'TRK');
        } elseif ($filter === 'KelasJauh') {
            $query = Siswa::where('pangkalan', '!=', 'TRK');
        } else {
            $query = Siswa::query();
        }

        return Excel::download(new SiswaExport($query->get()), 'siswa.xlsx');
    }
}
