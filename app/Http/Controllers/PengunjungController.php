<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Waktu;
use Illuminate\Support\Facades\Validator;
use App\Models\Pesanan;
use App\Models\Teknisi;
use App\Models\Kecamatan;
use App\Models\Pesananlain;
use Illuminate\Http\Request;
use App\Models\Akunpengunjung;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PengunjungController extends Controller
{
    public function beranda()
    {
        $teknisi = Teknisi::all();
        return view('pengunjung.layouts.main', compact('teknisi'));
    }

    public function form()
    {
        if (!cekAkun(auth()->user()->id)) {
            Alert::warning('Perhatian', 'Silakan lengkapi data profil terlebih dahulu.');
            return redirect()->route('profil', auth()->user()->id)->with('gagal', 'gagal');
        }
        $waktu = Waktu::all();
        $kecamatan = Kecamatan::all();
        return view('pengunjung.layouts.form', compact(['waktu', 'kecamatan']));
    }
    // Create
    public function tambahpesanan(Request $request, $kec)
    {
        $now = Carbon::now();
        // dd($request->all());
        if ($kec != "0") {
            $waktu = Carbon::parse($request->tanggal_datang);
            if ($now->gt($waktu)) {
                Alert::warning('Gagal', 'Tidak dapat memesan untuk tanggal kemarin dan hari ini.');
                return redirect('/form-pesanan');
            }
            // dd($kec);
            Pesananlain::create([
                'akun_id' => auth()->user()->id,
                'kecamatan_id' => auth()->user()->kecamatan_id,
                'nama' => auth()->user()->nama,
                'no_hp' => auth()->user()->no_hp,
                'alamat' => auth()->user()->alamat,
                'teknisi_id' => $request->teknisi_id,
                'tanggal_datang' => $request->tanggal_datang,
                'waktu_datang_id' => $request->waktu_datang_id,
                'keterangan' => $request->keterangan,
                'jumlah_ac' => $request->jumlah_ac,
                'kategori' => 'Alamat Sendiri',
                'status' => 'Dipesan',
            ]);
            // Push Notif
            $url = 'https://fcm.googleapis.com/fcm/send';

            $FcmToken = User::whereNotNull('device_token')->pluck('device_token')->all();

            $serverKey = 'AAAAdxc0_00:APA91bEWvIAmbyrCw1i7CgDRXdUDyGWXmnS9GtwlI9GU0qa9_2VrZl_wZjLKLbYQRqRMbt6aAPQJayEEy2bS6i6SHlOzF5bHuQZe0wQLHTQKD-YGMLLQHR0q7VjxOVyOij45EwchsLNF'; // ADD SERVER KEY HERE PROVIDED BY FCM

            $data = [
                "registration_ids" => $FcmToken,
                "notification" => [
                    "title" => auth()->user()->nama,
                    "body" => 'Membuat Pesanan Sendiri',
                ]
            ];
            $encodedData = json_encode($data);

            $headers = [
                'Authorization:key=' . $serverKey,
                'Content-Type: application/json',
            ];

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            // Disabling SSL Certificate support temporarly
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
            // Execute post
            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('Curl failed: ' . curl_error($ch));
            }
            // Close connection
            curl_close($ch);

            Alert::success('Berhasil', 'Pesanan telah berhasil dibuat. Silakan tunggu konfirmasi dari teknisi.');
            return redirect('/');
        } else {
            $waktu_lain = Carbon::parse($request->tanggal_datang_lain);
            if ($now->gt($waktu_lain)) {
                Alert::error('Gagal', 'Tanggal tidak valid');
                return redirect('/form-pesanan');
            }
            $pesan = Pesananlain::create([
                'akun_id' => auth()->user()->id,
                'kecamatan_id' => $request->kecamatan_id_lain,
                'teknisi_id' => $request->teknisi_id_lain,
                'tanggal_datang' => $request->tanggal_datang_lain,
                'waktu_datang_id' => $request->waktu_datang_id_lain,
                'kategori' => 'Alamat Lain',
                'status' => 'Dipesan',
            ]);
            Alert::info('Berhasil', 'Silakan isi formulir berikutnya.');
            return redirect('/form-pesanan-lain/' . $pesan->id);
        }
        // dd($request->except(['_token','submit']));
    }
    // Profil
    public function profil($akun_id)
    {
        $kecamatans = Kecamatan::all();
        $pesanan = Pesananlain::where('akun_id', $akun_id)->latest('created_at')->get();
        return view('pengunjung.layouts.profil', compact('pesanan', 'kecamatans'));
    }

    public function form_pesananlain($id)
    {
        $teknisi = Teknisi::all();
        $kecamatan = Kecamatan::all();
        // dd($teknisi);
        return view('pengunjung.layouts.form-pesananlain', compact(['teknisi', 'kecamatan', 'id']));
    }

    public function ambilteknisi($kec, $id, $tgl)
    {
        $teknisi = Teknisi::where('kecamatan_id', $kec)
            ->whereDoesntHave('relasipesanan', function ($q) use ($id, $tgl) {
                $q->where('waktu_datang_id', $id)
                    ->where('tanggal_datang', $tgl)
                    ->whereNotIn('status', ['selesai', 'batal']);
            })
            ->pluck('nama_teknisi', 'id');
        return response()->json($teknisi);
    }

    public function tambahform_pesananlain(Request $request, $id)
    {
        Pesananlain::find($id)->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'jumlah_ac' => $request->jumlah_ac
        ]);
        // Push Notif
        $url = 'https://fcm.googleapis.com/fcm/send';

        $FcmToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $serverKey = 'AAAAdxc0_00:APA91bEWvIAmbyrCw1i7CgDRXdUDyGWXmnS9GtwlI9GU0qa9_2VrZl_wZjLKLbYQRqRMbt6aAPQJayEEy2bS6i6SHlOzF5bHuQZe0wQLHTQKD-YGMLLQHR0q7VjxOVyOij45EwchsLNF'; // ADD SERVER KEY HERE PROVIDED BY FCM

        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => auth()->user()->nama,
                "body" => 'Membuat Pesanan Lain',
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);

        Alert::success('Berhasil', 'Pesanan telah berhasil dibuat. Silakan tunggu konfirmasi dari teknisi.');
        return redirect('/');
    }

    // Edit
    public function editpengunjung($id)
    {
        $akunpengunjung = User::find($id);

        return redirect('/profil/' . auth()->user()->id, compact(['akunpengunjung']));
    }
    // Ubah
    public function ubahpengunjung($id, Request $request)
    {
        // Validasi
        // $rules = [
        //     'nama' => 'required|string|max:255',
        //     'no_hp' => 'required|string|max:13',
        //     'kecamatan_id' => 'required|string|max:255',
        //     'alamat' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|string|min:8',
        // ];
        // Pesan error yang ingin ditampilkan (opsional)
        // $customMessages = [
        //     'nama.required' => 'Nama harus diisi.',
        //     'no_hp.required' => 'No HP harus berupa angka dan maksimal 13 angka.',
        //     'kecamatan_id.required' => 'Kecamatan harus dipilih.',
        //     'alamat.required' => 'alamat harus diisi.',
        //     'email.required' => 'Email harus diisi.',
        //     'email.unique' => 'Email sudah terdaftar.',
        //     'password.required' => 'Password harus diisi.',
        //     'password.min' => 'Password minimal harus terdiri dari 8 karakter.'
        // ];
        // $validator = Validator::make($request->all(), $rules, $customMessages);
        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $akunpengunjung = User::find($id);
        $akunpengunjung->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'kecamatan_id' => $request->kecamatan_id,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        Alert::success('Berhasil', 'Perubahan data berhasil disimpan.');
        return redirect('/profil/' . auth()->user()->id);
    }

    // Push Notification
    public function updateDeviceToken(Request $request)
    {
        $user = User::find(auth()->user()->id);
        if (is_null($user->device_token)) {
            $user->device_token =  $request->token;
            $user->save();
        }
        return response()->json(['Token berhasil disimpan.']);
    }

    // Ulasan
    public function ulasan(Request $request, $id)
    {
        $ulasan = Pesananlain::find($id);
        $ulasan->update([
            'ulasan' => $request->ulasan
        ]);
        Alert::success('Ulasan Terkirim', 'Terima kasih telah menggunakan layanan kami. Semoga ulasan Anda dapat memberikan manfaat bagi kami.');
        return redirect('/profil/' . auth()->user()->id);
    }
}
