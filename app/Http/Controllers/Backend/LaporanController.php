<?php

namespace App\Http\Controllers\Backend;

use App\Exports\Lamaran;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
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
        
        if ($step == 1) {
            return Excel::download(new Lamaran($step), $time . '_Data_Step_1.xlsx');
        } else if ($step == 2) {
            return Excel::download(new Lamaran($step), $time . '_Data_Step_2.xlsx');
        } else if ($step == 3) {
            return Excel::download(new Lamaran($step), $time . '_Data_Step_3.xlsx');
        } else {
            return Excel::download(new Lamaran($step), $time . '_Data_Semua_Pelamar.xlsx');
        }
    }
}
