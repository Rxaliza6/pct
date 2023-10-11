<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use RealRashid\SweetAlert\Facades\Alert;

class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        try{
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            
            if ($finduser) {
                Auth::login($finduser);
                Alert::success('Berhasil','Login berhasil.');
                return redirect()->intended('/');
            }else{
                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'nama' => $user->nama,
                        'google_id' => $user->id,
                        'password' => Hash::make('password')
                    ]);
                Auth::login($newUser);
                Alert::success('Berhasil','Login berhasil.');
                return redirect()->intended('/');

            }
        } catch(Exception $e){
            // dd($e->getMessage());
            Alert::error('Gagal','Login Gagal');
            return redirect('/login');
        }
    }
}
