<?php

namespace App\Exports;

use App\Models\Nilai;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class Lamaran implements ShouldAutoSize, WithMapping, FromCollection, WithHeadings
{
    protected $step;

    function __construct($step)
    {
        $this->step = $step;
    }

    public function map($lamaran): array
    {
        return [
            $lamaran->lamaran->job->nama_pekerjaan,
            $lamaran->lamaran->user->name,
            $lamaran->lamaran->no_kk,
            $lamaran->lamaran->jenis_kelamin,
            date('Y-m-d', strtotime($lamaran->lamaran->tanggal_lahir)),
            $lamaran->lamaran->no_hp,
            $lamaran->lamaran->pendidikan,
            $lamaran->lamaran->npwp,
            date('Y-m-d', strtotime($lamaran->lamaran->tanggal_skck)),
            $lamaran->lamaran->bank,
            $lamaran->lamaran->rekening,
            $lamaran->lamaran->surat_sehat,
            date('Y-m-d', strtotime($lamaran->lamaran->created_at)),
            $lamaran->ujian_tertulis,
            $lamaran->wawancara,
            $lamaran->praktik,
        ];
    }

    public function collection()
    {
        $step = $this->step;

        if ($step == 1) {
            return Nilai::where('ujian_tertulis', '!=', null)->get();
        } else if ($step == 2) {
            return Nilai::where('wawancara', '!=', null)->get();
        } else if ($step == 3) {
            return Nilai::where('praktik', '!=', null)->get();
        } else if ($step == 'all') {
            return Nilai::all();
        }              
        else {
            return Nilai::where('id_lamaran', 0)->get();            
        }
    }

    public function headings(): array
    {
        return [
            'Pekerjaan Dilamar',
            'Nama Pelamar',
            'No KK',
            'Jenis Kelamin',
            'Tanggal Lahir',
            'No HP',
            'Pendidikan',
            'NPWP',
            'Tanggal SKCK',
            'BANK',
            'No Rekening',
            'Surat Sehat',
            'Lamaran Dibuat',
            "Nilai Ujian Tertulis",
            "Nilai Wawancara",
            "Nilai Ujian Praktik",
        ];
    }
}
