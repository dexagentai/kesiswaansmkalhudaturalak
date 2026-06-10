<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count();
        $totalTRK = Siswa::where('pangkalan', 'TRK')->count();
        $kelasList = Siswa::select('kelas_jurusan')->distinct()->get();

        return view('dashboard.index', compact('totalSiswa', 'totalTRK', 'kelasList'));
    }
}
