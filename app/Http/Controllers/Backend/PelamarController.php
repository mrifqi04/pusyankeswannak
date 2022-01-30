<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Models\Log;
use App\Models\Nilai;
use App\Models\Status;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PelamarController extends Controller
{
    public function index()
    {
        $lamaran = Lamaran::with('user')->get();

        return view('backend.data-pelamar', compact('lamaran'));
    }

    public function detail($id)
    {
        $lamaran = Lamaran::where('id', $id)
            ->with('user')
            ->with('job')
            ->with('address')
            ->with('file')
            ->first();

        return view('backend.detail-pelamar', compact('lamaran'));
    }

    public function accept($id)
    {
        $accept = Lamaran::find($id);

        $accept->update(['status' => 'Accepted']);

        $status = Status::create([
            'lamaran_id' => $accept->id,
            'user_id' => $accept->user_id,
            'step' => 'TAHAP 1',
            'ket' => 'PENYORTIRAN BERKAS',
            'status' => 'LULUS'
        ]);


        Nilai::where('lamaran_id', $accept->id)->update([            
            'berkas' => 'Lulus',
            'job_id' => $accept->job_id
        ]);

        Log::create([
            'admin_id' => Auth::user()->id,
            'aktifitas' => "Menerima berkas Peserta-" . $accept->id
        ]);

        Alert::success('Diterima', 'Pelamar berhasil diterima');

        return redirect('data-pelamar');
    }

    public function reject(Request $request, $id)
    {        
        $reject = Lamaran::find($id);
        $reason = $request->text;
        
        $reject->update([
            'status' => 'Rejected',
            'reason' => $reason,
        ]);

        $status = Status::create([
            'lamaran_id' => $reject->id,
            'user_id' => $reject->user_id,
            'step' => 'TAHAP 1',
            'ket' => 'PENYORTIRAN BERKAS',
            'status' => 'GAGAL'
        ]);

        Nilai::where('lamaran_id', $reject->id)->update([            
            'berkas' => 'Gagal',
            'job_id' => $reject->job_id
        ]);

        Log::create([
            'admin_id' => Auth::user()->id,
            'aktifitas' => "Menolak berkas Peserta-" . $reject->id
        ]);

        // Alert::success('Ditolak', 'Pelamar berhasil ditolak');

        // return redirect('data-pelamar');
    }
}
