<?php

namespace App\Http\Controllers\Backend;

use App\Models\Job;

use Auth;
use App\Models\Log;
use App\Models\Nilai;
use App\Models\Status;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class InputTestController extends Controller
{
    public function inputTestTertulis()
    {
        $lamaran = Lamaran::with('user')
            ->with(['job', 'nilai'])
            ->where('status', 'Accepted')
            ->orWhere('status', 'Lulus')
            ->get();

        return view('backend.test_tertulis.input_test_tertulis', compact('lamaran'));
    }

    public function storeTestTertulis(Request $request)
    {
        $nilai = $request->data;
        $id = $request->id;
        $findlamar = Lamaran::find($id);
        $id_job = $findlamar->job_id;
        $job = Job::find($id_job);
        $min_nilai = $job->minimum_tertulis;
        $lamaran = Nilai::where('lamaran_id', $id)->first();
        $step_nilai = $lamaran->ujian_tertulis;
        
        if (!$step_nilai) {
            if ($nilai >= $min_nilai) {
                $status = 'LULUS';
            } else if ($nilai < $min_nilai) {
                $status = 'GAGAL';
            }                    
            Status::create([
                'lamaran_id' => $id,
                'user_id' => $findlamar->user_id,
                'step' => 'STEP 2',
                'ket' => 'UJIAN TERTULIS',
                'status' => $status
            ]);            
        } else {
            if ($nilai >= $min_nilai) {
                Status::where('STEP', 'STEP 2')->update(['status' => 'LULUS']);
            } else if ($nilai < $min_nilai) {
                Status::where('STEP', 'STEP 2')->update(['status' => 'GAGAL']);
            }
        }

        $lamaran->ujian_tertulis = $nilai;
        $lamaran->save();

        Log::create([
            'admin_id' => Auth::user()->id,
            'aktifitas' => "Meninput nilai tes tertulis Peserta-" . $findlamar->id
        ]);
    }

    public function inputTestWawancara()
    {
        $lamaran = Lamaran::with('user')
            ->with('job')
            ->with('nilai')
            ->where('status', 'Accepted')
            ->orWhere('status', 'Lulus')
            ->get();

        return view('backend.test_wawancara.input_test_wawancara', compact('lamaran'));
    }

    public function storeTestWawancara(Request $request)
    {
        $nilai = $request->data;
        $id = $request->id;
        $findlamar = Lamaran::find($id);
        $id_job = $findlamar->job_id;
        $job = Job::find($id_job);
        $lamaran = Nilai::where('lamaran_id', $id)->first();
        $min_nilai = $job->minimum_wawancara;
        $step_nilai = $lamaran->wawancara;
        $get_kuota = Lamaran::where('job_id', $job->id)->get();
        $kuota = count($get_kuota);

        if (!$step_nilai) {
            if ($nilai >= $min_nilai) {
                $status = 'LULUS';
            } else if ($nilai < $min_nilai) {
                $status = 'GAGAL';
            }

            Status::create([
                'lamaran_id' => $id,
                'user_id' => $findlamar->user_id,
                'step' => 'STEP 3',
                'ket' => 'UJIAN WAWANCARA',
                'status' => $status
            ]);
        } else {
            if ($nilai >= $min_nilai) {
                Status::where('STEP', 'STEP 3')->update(['status' => 'LULUS']);                
            } else if ($nilai < $min_nilai) {
                Status::where('STEP', 'STEP 3')->update(['status' => 'GAGAL']);
            }
        }

        if ($findlamar->job_id != 3 && $kuota <= $job->kuota) {
            $findlamar->update(['status' => 'Lulus']);
        }

        $lamaran->wawancara = $nilai;
        $lamaran->save();

        Log::create([
            'admin_id' => Auth::user()->id,
            'aktifitas' => "Meninput nilai tes wawancara Peserta-" . $findlamar->id
        ]);
    }

    public function inputTestPraktik()
    {
        $lamaran = Lamaran::with('user')
            ->with('job')
            ->with('nilai')
            ->where('status', 'Accepted')
            ->where('job_id', 3)
            ->get();

        return view('backend.test_praktik.input_test_praktik', compact('lamaran'));
    }

    public function storeTestPraktik(Request $request)
    {
        $nilai = $request->data;
        $id = $request->id;

        $lamaran = Nilai::where('lamaran_id', $id)->first();

        $findlamar = Lamaran::find($id);

        $id_job = $findlamar->job_id;
        $job = Job::find($id_job);
        $min_nilai = $job->minimum_praktik;
        $step_nilai = $lamaran->praktik;

        $get_kuota = Lamaran::where('job_id', $job->id)->get();
        $kuota = count($get_kuota);
        
        if (!$step_nilai) {
            if ($nilai >= $min_nilai) {
                $status = 'LULUS';
            } else if ($nilai < $min_nilai) {
                $status = 'GAGAL';
            }

            Status::create([
                'lamaran_id' => $id,
                'user_id' => $findlamar->user_id,
                'step' => 'STEP 4',
                'ket' => 'UJIAN PRAKTIK',
                'status' => $status
            ]);
        } else {
            if ($nilai >= $min_nilai) {
                Status::where('STEP', 'STEP 4')->update(['status' => 'LULUS']);                
            } else if ($nilai < $min_nilai) {
                Status::where('STEP', 'STEP 4')->update(['status' => 'GAGAL']);
            }
        }

        if ($kuota <= $job->kuota) {
            $findlamar->update(['status' => 'Lulus']);
        } else {
            $findlamar->update(['status' => 'Gagal']);
        }

        $lamaran->praktik = $nilai;
        $lamaran->save();

        Log::create([
            'admin_id' => Auth::user()->id,
            'aktifitas' => "Meninput nilai tes praktik Peserta-" . $findlamar->id
        ]);
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

        Log::create([
            'admin_id' => Auth::user()->id,
            'aktifitas' => 'Mengupdate jumlah kuota ' . $job->nama_pekerjaan . ' - ' . $job->kuota
        ]);

        Alert::success('Berhasil', 'Kuota berhasil di update');

        return redirect('/update-kuota-posisi');
    }
}
