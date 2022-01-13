<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use File;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        return view('front.profile');
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
