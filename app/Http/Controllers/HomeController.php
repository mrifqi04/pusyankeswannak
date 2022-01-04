<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.homepage');
    }

    public function timeline()
    {
        return view('front.timeline_penerimaan');
    }

    public function persyaratan()
    {
        return view('front.persyaratan');
    }
}
