<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',      
        'job_id',      
        'no_kk',            
        'jenis_kelamin',
        'tanggal_lahir',
        'no_hp',
        'pendidikan',
        'npwp',
        'tanggal_skck',
        'bank',
        'rekening',
        'surat_sehat'
    ];
}
