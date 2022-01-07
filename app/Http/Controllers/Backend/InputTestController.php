<?php

namespace App\Http\Controllers\Backend;

use App\Models\Lamaran;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Nilai;

class InputTestController extends Controller
{
    public function inputTestTertulis()
    {
        $lamaran = Lamaran::with('user')
        ->with('job')        
        ->with('nilai')        
        ->get();
        
        return view('backend.test_tertulis.input_test_tertulis', compact('lamaran'));
    }

    public function storeTestTertulis(Request $request)
    {        
        $nilai = $request->data;
        $id = $request->id;

        $lamaran = Nilai::where('lamaran_id', $id)->first();

        if ($lamaran) {
            // dd($nilai);
            $lamaran->ujian_tertulis = $nilai;
            $lamaran->save();
        } else {
            Nilai::create([
                'lamaran_id' => $id,
                'ujian_tertulis' => $nilai
            ]);
        }
    }
}
