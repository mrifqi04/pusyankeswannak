<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'lamaran_id',
        'user_id',
        'step',
        'status',
        'ket'
    ];

    function lamaran()
    {
        return $this->hasMany(Lamaran::class, 'id', 'lamaran_id');
    }
}
