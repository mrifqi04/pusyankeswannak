<?php

namespace App\Http\Controllers\Backend;

use App\Models\Timeline;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

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
        
        Alert::success('Berhasil ditambahkan');

        return redirect()->back();
    }
}
