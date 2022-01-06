<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function userLogin()
    {
        return view('front.masuk_akun_pelamar');
    }

    public function userRegister()
    {
        return view('front.daftar_akun_pelamar');
    }

    public function storeRegister(Request $request)
    {
        // dd($request);
        $requestData = $request->all();

        $user = User::create($requestData);
        $user->role_id = 2;
        $user->save();

        Auth::login($user);

        return redirect('/');
    }
}
