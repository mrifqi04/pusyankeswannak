<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Log;
use App\Models\Nilai;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $logs = Log::select(array('logs.created_at', 'logs.aktifitas', 'u.name'))        
        ->leftJoin('users as u', 'logs.admin_id' , '=', 'u.id')
        ->orderBy('logs.id', 'asc')
        ->get();        

        $average_pks = Lamaran::average(1);        
        $average_tl = Lamaran::average(2);        
        $average_ttps = Lamaran::average(3);        
        $average_ipal = Lamaran::average(4);        
        $average_pk = Lamaran::average(5);        
        $average_tmdl = Lamaran::average(6);        
        $average_pcr = Lamaran::average(7);        
        $average_pi = Lamaran::average(8);        
        $average_ts = Lamaran::average(9);        
        $average_ppt = Lamaran::average(10);        
        $average_tkbk = Lamaran::average(11);        
        $average_tkk = Lamaran::average(12);        

        // dd($average_pks);

        return view('backend.dashboard', compact(
            'logs',            
            'average_pks',
            'average_tl',
            'average_ttps',
            'average_ipal',
            'average_pk',
            'average_tmdl',
            'average_pcr',
            'average_pi',
            'average_ts',
            'average_ppt',
            'average_tkbk',
            'average_tkk',
        ));
    }

    public function logs()
    {
        $logs = Log::select(array('logs.created_at', 'logs.aktifitas', 'logs.id', 'u.name'))        
        ->leftJoin('users as u', 'logs.admin_id' , '=', 'u.id')
        ->orderBy('logs.id', 'asc')
        ->get();                

        return view('backend.admin-activity-log', compact('logs'));
    }

    public function statistik()
    {
        $data = Lamaran::getStatistic();

        return response()->json($data);
    }
}
