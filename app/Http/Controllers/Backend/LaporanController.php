<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Log;
use App\Exports\Lamaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanController extends Controller
{
    public function index()
    {
        return view('backend.cetak_laporan');
    }

    public function export(Request $request)
    {
        $time = Carbon::now();
        $time = date('Y-m-d', strtotime($time));

        $step = $request->step;
        
        Log::create([
            'admin_id' => Auth::user()->id,
            'aktifitas' => "Mencetak data laporan tahap-" . $step
        ]);

        if ($step == 1) {
            return Excel::download(new Lamaran($step), $time . '_Data_Step_1.xlsx');
        } else if ($step == 2) {
            return Excel::download(new Lamaran($step), $time . '_Data_Step_2.xlsx');
        } else if ($step == 3) {
            return Excel::download(new Lamaran($step), $time . '_Data_Step_3.xlsx');
        } else if ($step == 4) {
            return Excel::download(new Lamaran($step), $time . '_Data_Step_4.xlsx');
        } else {
            return Excel::download(new Lamaran($step), $time . '_Data_Semua_Pelamar.xlsx');
        }        
    }
}
