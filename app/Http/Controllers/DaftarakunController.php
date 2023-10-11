<?php

namespace App\Http\Controllers;

use App\Models\Akunpengunjung;
use App\Models\Kecamatan;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DaftarakunController extends Controller
{
    
    public function signup()
    {
        $kecamatan = Kecamatan::all();
        return view('pengunjung.layouts.daftarakun', compact(['kecamatan']));
    }
    // Create
    public function daftarakun(Request $request)
        {
            // dd($request->except(['_token','submit']));

            // Validasi
            $rules = [
                'nama' => 'required|string|max:255',
                'no_hp' => 'required|string|max:13',
                'kecamatan_id' => 'required|string|max:255',
                'alamat' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
            ];
            // Pesan error yang ingin ditampilkan (opsional)
            $customMessages = [
                'nama.required' => 'Nama harus diisi.',
                'no_hp.required' => 'No HP harus berupa angka dan maksimal 13 angka.',
                'kecamatan_id.required' => 'Kecamatan harus dipilih.',
                'alamat.required' => 'alamat harus diisi.',
                'email.required' => 'Email harus diisi.',
                'email.unique' => 'Email sudah terdaftar.',
                'password.required' => 'Password harus diisi.',
                'password.min' => 'Password minimal harus terdiri dari 8 karakter.'
            ];
            $validator = Validator::make($request->all(), $rules, $customMessages);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            // dd($request->all());


            User::create([
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'kecamatan_id' => $request->kecamatan_id,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            Alert::success('Berhasil','Pendaftaran akun berhasil.');
            return redirect('/');

            
        }
}
