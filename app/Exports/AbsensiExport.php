<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class AbsensiExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data->map(function ($item, $index) {
            $row = [
                'No' => $index + 1,
                'NIS' => "'" . $item->nisn,
                'Nama Peserta Didik' => $item->nama,
            ];

            for ($i = 1; $i <= 31; $i++) {
                $row[$i] = '';
            }

            return $row;
        });
    }

    public function headings(): array
    {
        $headings = ['No', 'NIS', 'Nama Peserta Didik'];
        for ($i = 1; $i <= 31; $i++) {
            $headings[] = (string)$i;
        }
        return $headings;
    }

    public function styles(Worksheet $sheet)
    {
        // Tambahkan logo sekolah di kiri atas
        $logo = new Drawing();
        $logo->setPath(public_path('images/logo_alhuda.png')); // pastikan file logo ada di /public/images/
        $logo->setHeight(80);
        $logo->setCoordinates('A1');
        $logo->setWorksheet($sheet);

        // Header sekolah
        $sheet->mergeCells('C1:AF1')->setCellValue('C1', 'YAYASAN AL HUDA TURALAK');
        $sheet->mergeCells('C2:AF2')->setCellValue('C2', 'SEKOLAH MENENGAH KEJURUAN (SMK) AL HUDA TURALAK');
        $sheet->mergeCells('C3:AF3')->setCellValue('C3', 'STATUS TERAKREDITASI A');
        $sheet->mergeCells('C4:AF4')->setCellValue('C4', 'DAFTAR HADIR PESERTA DIDIK');

        // Info guru
        $sheet->setCellValue('A6', 'Nama Guru :');
        $sheet->setCellValue('A7', 'Mata Pelajaran :');
        $sheet->setCellValue('A8', 'Kelas/Semester :');

        // Gaya teks header
        $sheet->getStyle('C1:C4')->getFont()->setBold(true)->setSize(14);
        $sheet->getStyle('C1:C4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A6:A8')->getFont()->setBold(true);

        // Heading tabel
        $sheet->getStyle('A10:AF10')->getFont()->setBold(true);
        $sheet->getStyle('A10:AF10')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Border tabel
        $sheet->getStyle('A10:AF' . (count($this->data) + 10))
              ->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Format angka NISN tetap teks
        $sheet->getStyle('B11:B' . (count($this->data) + 10))
              ->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);

        // Area tanda tangan di bawah
        $rowEnd = count($this->data) + 15;
        $sheet->mergeCells("A{$rowEnd}:M{$rowEnd}")
              ->setCellValue("A{$rowEnd}", "Mengetahui,\nWaka Kurikulum\n\n\n__________________________");
        $sheet->mergeCells("N{$rowEnd}:AF{$rowEnd}")
              ->setCellValue("N{$rowEnd}", "Garut, __________ 2026\nGuru Mapel\n\n\n__________________________");
        $sheet->getStyle("A{$rowEnd}:AF{$rowEnd}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 15,
            'C' => 30,
        ];
    }
}
