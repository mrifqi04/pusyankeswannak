<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'lamaran_id',
        'jalan',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi'
    ];
}
