<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        // hapus semua data siswa tanpa ganggu foreign key
        DB::table('siswa')->delete();
        // reset auto increment ke 1
        DB::statement('ALTER TABLE siswa AUTO_INCREMENT = 1');

        $file = fopen(database_path('seeders/data/siswa.csv'), 'r');
        $firstRow = true;

        while (($data = fgetcsv($file, 1000, ';')) !== FALSE) {
            if ($firstRow) { 
                $firstRow = false; 
                continue; // skip header
            }

            if (count($data) < 8) {
                continue; // skip baris tidak lengkap
            }

            // konversi tanggal lahir ke format MySQL (YYYY-MM-DD)
            $tanggal = null;
            if (!empty($data[6])) {
                $tanggal = date('Y-m-d', strtotime(str_replace('/', '-', $data[6])));
            }

            DB::table('siswa')->insert([
                'nama'           => $data[0] ?? null,
                'nisn'           => $data[1] ?? null,
                'jk'             => $data[2] ?? null,
                'kelas_jurusan'  => $data[3] ?? null,
                'alamat'         => $data[4] ?? null,
                'tempat_lahir'   => $data[5] ?? null,
                'tanggal_lahir'  => $tanggal,
                'pangkalan'      => $data[7] ?? null,
            ]);
        }

        fclose($file);
    }
}
