<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    // 3
    function average($id)
    {        
        $lamaran = DB::table('lamarans as l')
            ->select(
                array(
                    DB::raw('sum(n.ujian_tertulis) as ujian_tertulis'),
                    DB::raw('count(l.id) as total'),
                )
            )
            ->where('l.job_id', $id)
            ->leftJoin('nilais as n', 'n.lamaran_id', '=', 'l.id')
            ->groupBy('n.job_id')
            ->first();        
        if (!$lamaran) {
            $average = 0;            
        } else {
            $average = $lamaran->ujian_tertulis / $lamaran->total;
        }


        return $average;
    }
}
