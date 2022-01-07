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
        'surat_sehat',
        'status'
    ];

    function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    function job()
    {
        return $this->hasOne(Job::class, 'id', 'job_id');
    }

    function address()
    {
        return $this->hasOne(Address::class, 'lamaran_id', 'id');
    }

    function file()
    {
        return $this->hasOne(File::class, 'lamaran_id', 'id');
    }

    function nilai()
    {
        return $this->hasOne(Nilai::class, 'lamaran_id', 'id');
    }
}
