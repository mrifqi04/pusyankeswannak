<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Time;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.homepage');
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
}
