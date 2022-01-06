<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'lamaran_id',
        'file_ktp',
        'file_kk',
        'file_foto',
        'file_nilai_ijazah',
        'file_npwp',
        'file_skck',
        'file_sim',
        'file_surat_sehat',
        'file_sertifikat',
        'file_lamaran',
        'file_cv',
    ];
}
