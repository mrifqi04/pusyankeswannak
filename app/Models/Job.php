<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'minimum_tertulis',
        'minimum_wawancara',
        'minimum_praktik',
        'kuota'
    ];
}
