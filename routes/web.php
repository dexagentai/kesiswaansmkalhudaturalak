<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdministrasiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/siswa', [SiswaController::class, 'index']);
Route::get('/absensi', [AbsensiController::class, 'index']);
Route::get('/siswa/create', [SiswaController::class, 'create']);
Route::post('/siswa', [SiswaController::class, 'store']);
Route::get('/siswa/{id}/koreksi', [SiswaController::class, 'formKoreksi']);
Route::post('/siswa/{id}/koreksi', [SiswaController::class, 'simpanKoreksi']);
Route::get('/export-siswa', [SiswaController::class, 'export'])->name('siswa.export');
Route::get('/absensi/export', [AbsensiController::class, 'export'])->name('absensi.export');
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
Route::get('/administrasi', [AdministrasiController::class, 'index'])->name('administrasi.index');
