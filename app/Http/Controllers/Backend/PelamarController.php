<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use Illuminate\Http\Request;
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

        Alert::success('Diterima', 'Pelamar berhasil diterima');
        
        return redirect('data-pelamar');
    }

    public function reject($id)
    {
        $reject = Lamaran::find($id);

        $reject->update(['status' => 'Rejected']);

        Alert::success('Ditolak', 'Pelamar berhasil ditolak');
        
        return redirect('data-pelamar');
    }
}
