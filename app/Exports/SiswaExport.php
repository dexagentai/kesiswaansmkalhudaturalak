<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    protected $data;

    // constructor untuk menerima data dari controller
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'NISN',
            'JK',
            'Kelas/Jurusan',
            'Alamat',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Pangkalan'
        ];
    }
}
