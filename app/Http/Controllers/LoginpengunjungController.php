<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginpengunjungController extends Controller
{
    public function signin()
    {
        return view('pengunjung.layouts.login');
    }

    public function login(Request $request)
    {
        // dd($request);
        $login = $request->only(
            'email',
            'password'
        );

        if (Auth::attempt($login)){
            // dd($request->all());
            if (auth()->user()->role == "Admin") {
                Alert::success('Berhasil','Login berhasil. Selamat datang, Admin.');
                return redirect('/admin-dashboard');
            } else {
                Alert::success('Berhasil','Login berhasil.');
                return redirect('/');
            }
        } else {
            Alert::error('Gagal','Email atau kata sandi Anda salah.');
            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        Alert::success('Berhasil','Anda telah berhasil keluar (log out).');
        return redirect('/');
    }
    
}
