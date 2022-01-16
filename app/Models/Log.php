<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'aktifitas'
    ];

    function user()
    {
        return $this->hasOne(User::class, 'id', 'admin_id');
    }
}
