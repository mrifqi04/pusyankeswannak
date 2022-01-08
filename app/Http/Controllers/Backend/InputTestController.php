<?php

namespace App\Http\Controllers\Backend;

use App\Models\Lamaran;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Nilai;
use RealRashid\SweetAlert\Facades\Alert;

class InputTestController extends Controller
{
    public function inputTestTertulis()
    {
        $lamaran = Lamaran::with('user')
        ->with('job')        
        ->with('nilai')        
        ->get();
        
        return view('backend.test_tertulis.input_test_tertulis', compact('lamaran'));
    }

    public function storeTestTertulis(Request $request)
    {        
        $nilai = $request->data;
        $id = $request->id;

        $lamaran = Nilai::where('lamaran_id', $id)->first();

        if ($lamaran) {
            // dd($nilai);
            $lamaran->ujian_tertulis = $nilai;
            $lamaran->save();
        } else {
            Nilai::create([
                'lamaran_id' => $id,
                'ujian_tertulis' => $nilai
            ]);
        }
    }

    public function inputTestWawancara()
    {
        $lamaran = Lamaran::with('user')
        ->with('job')        
        ->with('nilai')        
        ->get();
        
        return view('backend.test_wawancara.input_test_wawancara', compact('lamaran'));
    }

    public function storeTestWawancara(Request $request)
    {        
        $nilai = $request->data;
        $id = $request->id;

        $lamaran = Nilai::where('lamaran_id', $id)->first();

        if ($lamaran) {
            // dd($nilai);
            $lamaran->wawancara = $nilai;
            $lamaran->save();
        } else {
            Nilai::create([
                'lamaran_id' => $id,
                'wawancara' => $nilai
            ]);
        }
    }

    public function inputTestPraktik()
    {
        $lamaran = Lamaran::with('user')
        ->with('job')        
        ->with('nilai')
        ->where('job_id', 3)        
        ->get();
        
        return view('backend.test_praktik.input_test_praktik', compact('lamaran'));
    }

    public function storeTestPraktik(Request $request)
    {        
        $nilai = $request->data;
        $id = $request->id;

        $lamaran = Nilai::where('lamaran_id', $id)->first();

        if ($lamaran) {
            // dd($nilai);
            $lamaran->praktik = $nilai;
            $lamaran->save();
        } else {
            Nilai::create([
                'lamaran_id' => $id,
                'praktik' => $nilai
            ]);
        }
    }

    public function inputMinNilai()
    {
        $jobs = Job::all();

        return view('backend.input_min_nilai', compact('jobs'));
    }

    public function storeMinNilai(Request $request)
    {        
        $id = $request->job;
        $test = $request->test;
        $nilai = $request->nilai;

        $job = Job::find($id);
        $job->update([
            $test => $nilai
        ]);

        Alert::success('Berhasil', 'Nilai berhasil di update');

        return redirect('/input-nilai-min');
    }

    public function inputKuotaPosisi()
    {
        $jobs = Job::all();

        return view('backend.update_kuota_posisi', compact('jobs'));
    }

    public function storeKuotaPosisi(Request $request)
    {        
        $id = $request->job;        
        $kuota = $request->kuota;

        $job = Job::find($id);
        $job->update([
            'kuota' => $kuota
        ]);

        Alert::success('Berhasil', 'Kuota berhasil di update');

        return redirect('/update-kuota-poissi');
    }
}
