<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Waktu;
use App\Models\Pesanan;
use App\Models\Teknisi;
use Barryvdh\DomPDF\PDF;
use App\Models\Kecamatan;
use App\Models\Pesananlain;
use Illuminate\Http\Request;
use App\Models\Akunpengunjung;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class Admin2Controller extends Controller
{
    // Dashboard       ======================================================
        public function dashboard()
        {
            $max_data = count(Pesananlain::get()) + 1;
            $dipesan = count(Pesananlain::where('status', 'Dipesan')->get());
            $diproses = count(Pesananlain::where('status', 'Diproses')->get());
            $selesai = count(Pesananlain::where('status', 'Selesai')->get());
            $dibatalkan = count(Pesananlain::where('status', 'Dibatalkan')->get());
            return view('admin2.layouts.dashboard', compact('max_data', 'dipesan', 'diproses', 'selesai', 'dibatalkan'));
        }

    //Akun Pengunjung  ======================================================
        // Read
        public function akunpengunjung()
        {
            $akunpengunjung = User::where('role', 'Pengunjung')->get();
            $kecamatan = Kecamatan::all();
            $kecamatans = Kecamatan::all();
            return view('admin2.layouts.akunpengunjung', compact(['akunpengunjung', 'kecamatan', 'kecamatans']));
        }
        // Delete
        public function hapuspengunjung($id)
        {
            $akunpengunjung = User::find($id);
            $akunpengunjung->delete();
            Alert::success('Berhasil', 'Penghapusan akun pengunjung berhasil.');
            return redirect('/data-akun-pengunjung');
        }
        // Create
        public function tambahpengunjung(Request $request)
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

            User::create([
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'kecamatan_id' => $request->kecamatan_id,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            Alert::success('Berhasil', 'Akun pengunjung berhasil ditambahkan.');
            return redirect('/data-akun-pengunjung');
        }
        // Edit
        public function editpengunjung($id)
        {
            $akunpengunjung = User::find($id);
            return redirect('/data-akun-pengunjung', compact(['akunpengunjung']));
        }
        // Ubah
        public function ubahpengunjung($id, Request $request)
        {
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

            $akunpengunjung = User::find($id);
            $akunpengunjung->update([
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'kecamatan_id' => $request->kecamatan_id,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            Alert::success('Berhasil', 'Perubahan akun pengunjung berhasil dilakukan.');
            return redirect('/data-akun-pengunjung');
        }

    //Akun Admin       ======================================================
        // Read
        public function akunadmin()
        {
            $admin = User::where('role', 'Admin')->get();
            $kecamatan = Kecamatan::all();
            $kecamatans = Kecamatan::all();
            return view('admin2.layouts.akunadmin', compact(['admin', 'kecamatan', 'kecamatans']));
        }
        // Delete
        public function hapusadmin($id)
        {
            $admin = User::find($id);
            $admin->delete();
            Alert::success('Berhasil', 'Penghapusan akun admin berhasil.');
            return redirect('/data-akun-admin');
        }
        // Create
        public function tambahadmin(Request $request)
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

            User::create([
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'kecamatan_id' => $request->kecamatan_id,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'role' => 'Admin',
                'password' => Hash::make($request->password)
            ]);
            Alert::success('Berhasil', 'Akun admin berhasil ditambahkan.');
            return redirect('/data-akun-admin');
        }
        // Edit
        public function editadmin($id)
        {
            $admin = User::find($id);
            return redirect('/data-akun-admin', compact(['admin']));
        }
        // Ubah
        public function ubahadmin($id, Request $request)
        {
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

            $admin = User::find($id);
            $admin->update([
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'kecamatan_id' => $request->kecamatan_id,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'role' => 'Admin',
                'password' => Hash::make($request->password)
            ]);
            Alert::success('Berhasil', 'Perubahan akun admin berhasil dilakukan.');
            return redirect('/data-akun-admin');
        }

    //Kecamatan        ======================================================
        // Read
        public function kecamatan()
        {
            $kecamatan = Kecamatan::all();
            return view('admin2.layouts.kecamatan', compact(['kecamatan']));
        }
        // Delete
        public function hapuskecamatan($id)
        {
            $kecamatan = Kecamatan::find($id);
            $kecamatan->delete();
            Alert::success('Berhasil', 'Penghapusan kecamatan berhasil.');
            return redirect('/data-kecamatan');
        }
        // Create
        public function tambahkecamatan(Request $request)
        {
            // dd($request->except(['_token','submit']));
            Kecamatan::create($request->except(['_token']));
            Alert::success('Berhasil', 'Kecamatan berhasil ditambahkan.');
            return redirect('/data-kecamatan');
        }
        // Edit
        public function editkecamatan($id)
        {
            $kecamatan = Kecamatan::find($id);
            return redirect('/data-kecamatan', compact(['kecamatan']));
        }
        // Ubah
        public function ubahkecamatan($id, Request $request)
        {
            $kecamatan = Kecamatan::find($id);
            $kecamatan->update($request->except(['_token']));
            return redirect('/data-kecamatan');
        }

    //Teknisi          ======================================================
        // Read
        public function teknisi()
        {
            $teknisi = Teknisi::all();
            $kecamatan = Kecamatan::all();
            $kecamatans = Kecamatan::all();
            return view('admin2.layouts.teknisi', compact(['teknisi', 'kecamatan', 'kecamatans']));
        }
        // Delete
        public function hapusteknisi($id)
        {
            $teknisi = Teknisi::find($id);
            deleteFile($teknisi->foto, "fototeknisi/");
            $teknisi->delete();
            Alert::success('Berhasil', 'Penghapusan teknisi berhasil.');
            return redirect('/data-teknisi');
        }
        // Create
        public function tambahteknisi(Request $request)
        {
            // dd($request->except(['_token','submit']));
             $teknisi = Teknisi::create($request->except(['_token']));
             if ($request->hasFile('foto')) {
                 $request->file('foto')->move('fototeknisi/', $teknisi->id. "-" .$request->file('foto')->getClientOriginalName());
                 $teknisi->foto =$teknisi->id. "-" .$request->file('foto')->getClientOriginalName();
                 $teknisi->save();
             }
            Alert::success('Berhasil', 'Teknisi berhasil ditambahkan.');
            return redirect('/data-teknisi');
        }
        // Edit
        public function editteknisi($id)
        {
            $teknisi = Teknisi::find($id);
            return redirect('/data-teknisi', compact(['teknisi']));
        }
        // Ubah
        public function ubahteknisi($id, Request $request)
        {
            $teknisi = Teknisi::find($id);
            $teknisi->update($request->except(['_token', 'foto']));
            // Update Foto
            $foto = $teknisi->foto;
            if ($request->file('foto')) {
                deleteFile($teknisi->foto, "fototeknisi/");
                $foto = $teknisi->id. "-" .$request->file('foto')->getClientOriginalName();
                if($request -> hasFile('foto')){
                    $request-> file('foto')->move('fototeknisi/', $foto);
                }
            }
            $teknisi->foto = $foto;
            $teknisi->save();
        // Update Foto End

            Alert::success('Berhasil', 'Perubahan teknisi berhasil dilakukan.');
            return redirect('/data-teknisi');
        }

    //Pesanan          ======================================================
        // Read
        public function pesanan()
        {
            $pesanan = Pesananlain::where('kategori', 'Alamat Sendiri')->latest("created_at")->get();
            return view('admin2.layouts.pesanan', compact(['pesanan']));
        }
        // Delete
        public function hapuspesanan($id)
        {
            $pesanan = Pesananlain::find($id);
            $pesanan->delete();
            return redirect('/data-pesanan');
        }
        // Create
        public function tambahpesanan(Request $request)
        {
            // dd($request->except(['_token','submit']));
            Pesananlain::create($request->except(['_token']));
            return redirect('/data-pesanan');
        }
        // Edit
        public function editpesanan($id)
        {
            $pesanan = Pesananlain::find($id);
            return redirect('/data-pesanan', compact(['pesanan']));
        }
        // Ubah
        public function ubahpesanan($id, Request $request)
        {
            $pesanan = Pesananlain::find($id);
            $pesanan->update($request->except(['_token']));
            Alert::success('Berhasil', 'Perubahan pesanan berhasil dilakukan.');
            return redirect()->route('pesanan_sendiri');
        }
        public function cetakpdf($id)
        {
            $pesanan = Pesananlain::find($id);
            return view('admin2.layouts.surat-tugas', compact(['pesanan']));
        }

    //Pesanan Lain     ======================================================
        // Read
        public function pesananlain()
        {
            $pesananlain = Pesananlain::where('kategori', 'Alamat Lain')->latest("created_at")->get();
            return view('admin2.layouts.pesananlain', compact(['pesananlain']));
        }
        // Delete
        public function hapuspesananlain($id)
        {
            $pesananlain = Pesananlain::find($id);
            $pesananlain->delete();
            return redirect('/data-pesananlain');
        }
        // Create
        public function tambahpesananlain(Request $request)
        {
            // dd($request->except(['_token','submit']));
            Pesananlain::create($request->except(['_token']));
            return redirect('/data-pesananlain');
        }
        // Edit
        public function editpesananlain($id)
        {
            $pesananlain = Pesananlain::find($id);
            return redirect('/data-pesananlain', compact(['pesananlain']));
        }
        // Ubah
        public function ubahpesananlain($id, Request $request)
        {
            $pesananlain = Pesananlain::find($id);
            $pesananlain->update($request->except(['_token']));
            Alert::success('Berhasil', 'Perubahan pesanan lain berhasil dilakukan.');
            return redirect('/data-pesananlain');
        }

    //Waktu Datang     ======================================================
        // Read
        public function waktudatang()
        {
            $waktu = Waktu::all();
            return view('admin2.layouts.waktudatang', compact(['waktu']));
        }
        // Delete
        public function hapuswaktudatang($id)
        {
            $waktu = Waktu::find($id);
            $waktu->delete();
            Alert::success('Berhasil', 'Penghapusan waktu datang berhasil.');
            return redirect('/waktu-datang');
        }
        // Create
        public function tambahwaktudatang(Request $request)
        {
            // dd($request->except(['_token','submit']));
            Waktu::create($request->except(['_token']));
            Alert::success('Berhasil', 'Waktu kedatangan berhasil ditambahkan.');
            return redirect('/waktu-datang');
        }
        // Edit
        public function editwaktudatang($id)
        {
            $waktu = Waktu::find($id);
            return redirect('/waktu-datang', compact(['pesananlain']));
        }
        // Ubah
        public function ubahwaktudatang($id, Request $request)
        {
            $waktu = Waktu::find($id);
            $waktu->update($request->except(['_token']));
            Alert::success('Berhasil', 'Perubahan waktu datang berhasil dilakukan.');
            return redirect('/waktu-datang');
        }

    // Laporan Pesanan ======================================================
        // Read
        public function laporanpesanan()
        {
            $pesanan = Pesananlain::where('kategori', 'Alamat Sendiri')->where('status', 'Selesai')->latest("created_at")->get();
            return view('admin2.layouts.laporan-pesanan', compact(['pesanan']));
        }
        // Cetak
        public function cetaklaporanpesanan(Request $request)
        {
            // dd($tglawal, $tglakhir);
            $cetakpesanan = Pesananlain::where('kategori', 'Alamat Sendiri')->where('status', 'Selesai')->whereBetween('tanggal_datang', [$request->tglAwal, $request->tglAkhir])->get();
            return view('admin2.layouts.cetak-laporan-pesanan', compact(['cetakpesanan']));
        }

    // Laporan Pesanan ======================================================
        // Read
        public function laporanpesananlain()
        {
            $pesananlain = Pesananlain::where('kategori', 'Alamat Lain')->where('status', 'Selesai')->latest("created_at")->get();
            return view('admin2.layouts.laporan-pesananlain', compact(['pesananlain']));
        }
        // Cetak
        public function cetaklaporanpesananlain(Request $request)
        {
            // dd($tglawal, $tglakhir);
            $cetakpesanan = Pesananlain::where('kategori', 'Alamat Lain')->where('status', 'Selesai')->whereBetween('tanggal_datang', [$request->tglAwal, $request->tglAkhir])->get();
            return view('admin2.layouts.cetak-laporan-pesananlain', compact(['cetakpesanan']));
        }
}
