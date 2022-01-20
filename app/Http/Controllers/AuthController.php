<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function userLogin()
    {
        return view('front.masuk_akun_pelamar');
    }

    public function storeLogin(Request $request)
    {
        try {
            // Validasi Input
            $request->validate([
                'nik' => 'required',
                'password' => 'required'
            ]);

            $credentials = $request->only('nik', 'password');

            if (Auth::attempt($credentials)) {
                // Authentication passed...
                if (Auth::user()->role_id == 1) {
                    return redirect('/dashboard');
                } else {
                    return redirect('/');
                }
            } else {
                return redirect()->back();
            }
        } catch (Exception $error) {
            return redirect()->back();
        }
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
        $user->update(['password' => Hash::make($request->password)]);
        $user->role_id = 2;
        $user->save();

        Auth::login($user);

        return redirect('/');
    }
}
