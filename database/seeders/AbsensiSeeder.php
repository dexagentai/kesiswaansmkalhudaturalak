<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Absensi;
use App\Models\Siswa;

class AbsensiSeeder extends Seeder
{
    public function run(): void
    {
        $siswa = Siswa::all();

        foreach ($siswa as $item) {
            Absensi::create([
                'siswa_id' => $item->id,
                'tanggal' => now()->toDateString(),
                'status' => 'Hadir',
            ]);
        }
    }
}
