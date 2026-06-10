<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrasiController extends Controller
{
    public function index()
    {
        // Daftar dokumen siap download
        $dokumen = [
            ['nama' => 'Surat Izin Siswa.docx', 'path' => 'dokumen/surat_izin sakit_siswa.docx'],
            ['nama' => 'Surat Izin Guru.pdf', 'path' => 'dokumen/surat_.docx'],
            ['nama' => 'Formulir Izin Kegiatan.xlsx', 'path' => 'dokumen/surat_izin_kegiatan.docx'],
            ['nama' => 'Rekap Absensi Bulanan.xlsx', 'path' => 'dokumen/rekap_absensi_bulanan.xlsx'],
        ];

        return view('administrasi.index', compact('dokumen'));
    }
}
