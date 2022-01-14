<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;

        $lamaran = Lamaran::where('user_id', $user_id)
        ->with(['nilai', 'job'])
        ->first();

        $status = Status::where('user_id', $user_id)->get();

        return view('front.profile', compact('lamaran', 'status'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->all();
        
        $user->update($data);
        
        if ($request->file('profile_picture')) {            
            $profile_picture = $request->file('profile_picture');

            $file_name = $id. '_' . $profile_picture->getClientOriginalName();            
            $user->update([
                'profile_picture' => $file_name
            ]);
                        
            $profile_picture->move('profile_picture/', $file_name);
        }
        
        Alert::success('Profile berhasil di update');

        return redirect('profile');
    }
}
