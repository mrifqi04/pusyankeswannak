<?php

namespace App\Http\Controllers\Backend;

use Alert;
use Auth;
use App\Models\Log;
use App\Models\Timeline;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    public function index()
    {
        $timelines = Timeline::all();

        return view('backend.admin-schedule', compact('timelines'));
    }

    public function setSchedule(Request $request, $id)
    {
        $timeline = Timeline::find($id);

        $data = $request->all();
                
        $timeline->update($data);  
        
        Log::create([
            'admin_id' => Auth::user()->id,
            'aktifitas' => "Mengupdate jadwal " . $timeline->timeline_name . ' - ' . date('d M Y', strtotime($request->timeline_start)) . ' / ' . date('d M Y', strtotime($request->timeline_end))
        ]);
        
        Alert::success('Berhasil ditambahkan');

        return redirect()->back();
    }
}
