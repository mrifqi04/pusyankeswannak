<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = [
        'lamaran_id',
        'ujian_tertulis',
        'wawancara',
        'praktik'
    ];
}
