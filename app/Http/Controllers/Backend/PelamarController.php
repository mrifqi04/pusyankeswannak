<?php

namespace App\Http\Controllers\Backend;

use App\Models\Status;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Auth;
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

        Status::create([
            'lamaran_id' => $accept->id,
            'user_id' => $accept->user_id,
            'step' => 'STEP 1',
            'ket' => 'PENYORTIRAN BERKAS',            
            'status' => 'LULUS'
        ]);

        Alert::success('Diterima', 'Pelamar berhasil diterima');
        
        return redirect('data-pelamar');
    }

    public function reject($id)
    {
        $reject = Lamaran::find($id);

        $reject->update(['status' => 'Rejected']);

        Status::create([
            'lamaran_id' => $reject->id,
            'user_id' => $reject->user_id,
            'step' => 'STEP 1',
            'ket' => 'PENYORTIRAN BERKAS',
            'status' => 'GAGAL'
        ]);

        Alert::success('Ditolak', 'Pelamar berhasil ditolak');
        
        return redirect('data-pelamar');
    }
}
