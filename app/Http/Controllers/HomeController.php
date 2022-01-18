<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Job;
use App\Models\File;
use App\Models\User;
use App\Models\Nilai;
use App\Models\Status;
use App\Models\Address;
use App\Models\Lamaran;
use App\Models\Timeline;
use Carbon\Carbon;
use Ramsey\Uuid\Type\Time;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        $jobs = Job::all();

        return view('front.homepage', compact('jobs'));
    }

    public function timeline()
    {
        $timelines = Timeline::all();

        return view('front.timeline_penerimaan', compact('timelines'));
    }

    public function persyaratan()
    {
        return view('front.persyaratan');
    }

    public function formPendaftaran($id)
    {
        $job = Job::find($id);

        $timeline = Timeline::find(1);
        $dateline = $timeline->timeline_end;

        $dt = Carbon::now();
        $now_date = $dt->toDateString();
        // dd($now_date, $dateline);
        if ($now_date > $dateline) {
            Alert::error("Maaf pendaftaran sudah ditutup");

            return redirect()->back();
        }

        return view('front.form_pendafatarn', compact('job'));
    }

    public function storePendaftaran(Request $request)
    {            
        $user_id = Auth::user()->id;
        $lamaran = Lamaran::create([
            'user_id' => $user_id,
            'job_id' => $request->posisi,
            'no_kk' => $request->no_kk,                        
            'pendidikan' => $request->pendidikan,
            'npwp' => $request->npwp,
            'tanggal_skck' => $request->tanggal_skck,
            'bank' => $request->bank,
            'rekening' => $request->rekening,
            'surat_sehat' => $request->surat_sehat,
            'status' => 'Proses'
        ]);

        $user = User::find($user_id);
        $user->update([
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,            
        ]);


        $address = Address::create([
            'lamaran_id' => $lamaran->id,
            'jalan' => $request->jalan,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
        ]);

        $file_ktp = $request->file('file_ktp');
        $file_kk = $request->file('file_kk');
        $file_foto = $request->file('file_foto');
        $file_nilai_ijazah = $request->file('file_nilai_ijazah');
        $file_npwp = $request->file('file_npwp');
        $file_skck = $request->file('file_skck');
        $file_sim = $request->file('file_sim');
        $file_surat_sehat = $request->file('file_surat_sehat');
        $file_sertifikat = $request->file('file_sertifikat');
        $file_lamaran = $request->file('file_lamaran');
        $file_cv = $request->file('file_cv');        

        $id = Auth::user()->id;
        
        $file_ktp_name = $id. '_' . $file_ktp->getClientOriginalName();
        $file_kk_name = $id. '_' . $file_kk->getClientOriginalName();
        $file_foto_name = $id. '_' . $file_foto->getClientOriginalName();
        $file_nilai_ijazah_name = $id. '_' . $file_nilai_ijazah->getClientOriginalName();
        $file_npwp_name = $id. '_' . $file_npwp->getClientOriginalName();
        $file_skck_name = $id. '_' . $file_skck->getClientOriginalName();
        if ($file_sim) {
            $file_sim_name = $id. '_' . $file_sim->getClientOriginalName();
        }
        $file_surat_sehat_name = $id. '_' . $file_surat_sehat->getClientOriginalName();
        $file_sertifikat_name = $id. '_' . $file_sertifikat->getClientOriginalName();
        $file_lamaran_name = $id. '_' . $file_lamaran->getClientOriginalName();
        $file_cv_name = $id. '_' . $file_cv->getClientOriginalName();


        $file = new File;
        $file->lamaran_id = $lamaran->id; 
        $file->file_ktp = $file_ktp_name;
        $file->file_kk = $file_kk_name;
        $file->file_foto = $file_foto_name;
        $file->file_nilai_ijazah = $file_nilai_ijazah_name;
        $file->file_npwp = $file_npwp_name;
        $file->file_skck = $file_skck_name;
        if ($file_sim) {
            $file->file_sim = $file_sim_name;
            $file_sim->move('file_pelamar/', $file_sim_name);
        }
        $file->file_surat_sehat = $file_surat_sehat_name;
        $file->file_sertifikat = $file_sertifikat_name;
        $file->file_lamaran = $file_lamaran_name;
        $file->file_cv = $file_cv_name;
        $file->save();
        
        $file_ktp->move('file_pelamar/', $file_ktp_name);
        $file_kk->move('file_pelamar/', $file_kk_name);
        $file_foto->move('file_pelamar/', $file_foto_name);
        $file_nilai_ijazah->move('file_pelamar/', $file_nilai_ijazah_name);
        $file_npwp->move('file_pelamar/', $file_npwp_name);
        $file_skck->move('file_pelamar/', $file_skck_name);        
        $file_surat_sehat->move('file_pelamar/', $file_surat_sehat_name);
        $file_sertifikat->move('file_pelamar/', $file_sertifikat_name);
        $file_lamaran->move('file_pelamar/', $file_lamaran_name);
        $file_cv->move('file_pelamar/', $file_cv_name);        

        Status::create([
            'lamaran_id' => $lamaran->id,
            'user_id' => Auth::user()->id,
            'step' => 'STEP 1',
            'ket' => 'PENYORTIRAN BERKAS',
            'status' => 'PROSES'
        ]);

        Nilai::create([
            'lamaran_id' => $lamaran->id,
            'berkas' => 'Proses',            
        ]);

        Alert::success('Terkirim', 'Lamaran mu berhasil terikirim');

        return redirect('/');
    }
}
