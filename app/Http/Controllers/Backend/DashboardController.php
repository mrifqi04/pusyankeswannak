<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $logs = Log::leftJoin('users as u', 'logs.admin_id' , '=', 'u.id')
        ->orderBy('logs.id', 'desc')      
        ->get();

        return view('backend.dashboard', compact('logs'));
    }

    public function logs()
    {
        $logs = Log::leftJoin('users as u', 'logs.admin_id' , '=', 'u.id')
        ->orderBy('logs.id', 'desc')      
        ->get();

        return view('backend.admin-activity-log', compact('logs'));
    }
}
