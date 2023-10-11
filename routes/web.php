<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin2Controller;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\DaftarakunController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\LoginpengunjungController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Pengunjung Controller==============================
Route::get('/', [PengunjungController::class, 'beranda']);
Route::group(['middleware' => 'auth'], function () {
    Route::get('/form-pesanan', [PengunjungController::class, 'form']);
    Route::get('/teknisi-pesan/{kec}/{id}/{tgl}', [PengunjungController::class, 'ambilteknisi']);
    Route::post('/form-pesanan/tambah/{kec}', [PengunjungController::class, 'tambahpesanan']);
    Route::get('/form-pesanan-lain/{id}', [PengunjungController::class, 'form_pesananlain']);
    Route::post('/form-pesanan-lain/tambah/{id}', [PengunjungController::class, 'tambahform_pesananlain']);
});
Route::get('/profil/{akun_id}', [PengunjungController::class, 'profil'])->name('profil');
// Login Controller
Route::get('/login', [LoginpengunjungController::class, 'signin'])->name("login");
Route::post('/login', [LoginpengunjungController::class, 'login']);
Route::get('/logout', [LoginpengunjungController::class, 'logout']);
// Daftar Akun Controller
Route::get('/daftar-akun', [DaftarakunController::class, 'signup']);
Route::post('/daftar-akun/tambah', [DaftarakunController::class, 'daftarakun']);
// Login Facebook
Route::controller(FacebookController::class)->group(function () {
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});
// Login Google
Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});
// Edit Akun
Route::get('/profil/{id}/edit', [PengunjungController::class, 'editpengunjung']);
Route::put('/profil/{id}', [PengunjungController::class, 'ubahpengunjung']);

// Ulasan
Route::put('/ulasan/{id}', [PengunjungController::class, 'ulasan']);

// Push Notification
Route::post('/notif', [PengunjungController::class, 'updateDeviceToken'])->name('notif');


// Admin2 Controller===================================
Route::middleware(['auth', 'role:Admin'])->group(function () {
    // Dashboard*******************************************
    route::get('/admin-dashboard', [Admin2Controller::class, 'dashboard']);

    // Akun Pengunjung*************************************
    // Read
    route::get('/data-akun-pengunjung', [Admin2Controller::class, 'akunpengunjung']);
    // Delete
    route::delete('/data-akun-pengunjung/{id}', [Admin2Controller::class, 'hapuspengunjung']);
    // Create
    Route::post('/data-akun-pengunjung/tambah', [Admin2Controller::class, 'tambahpengunjung']);
    // Edit
    Route::get('/data-akun-pengunjung/{id}/edit', [Admin2Controller::class, 'editpengunjung']);
    Route::put('/data-akun-pengunjung/{id}', [Admin2Controller::class, 'ubahpengunjung']);

    // Akun Admin******************************************
    // Read
    route::get('/data-akun-admin', [Admin2Controller::class, 'akunadmin']);
    // Delete
    route::delete('/data-akun-admin/{id}', [Admin2Controller::class, 'hapusadmin']);
    // Create
    Route::post('/data-akun-admin/tambah', [Admin2Controller::class, 'tambahadmin']);
    // Edit
    Route::get('/data-akun-admin/{id}/edit', [Admin2Controller::class, 'editadmin']);
    Route::put('/data-akun-admin/{id}', [Admin2Controller::class, 'ubahadmin']);

    // Akun Admin******************************************
    // Read
    route::get('/data-akun-admin', [Admin2Controller::class, 'akunadmin']);
    // Delete
    route::delete('/data-akun-admin/{id}', [Admin2Controller::class, 'hapusadmin']);
    // Create
    Route::post('/data-akun-admin/tambah', [Admin2Controller::class, 'tambahadmin']);
    // Edit
    Route::get('/data-akun-admin/{id}/edit', [Admin2Controller::class, 'editadmin']);
    Route::put('/data-akun-admin/{id}', [Admin2Controller::class, 'ubahadmin']);

    // Kecamatan*******************************************
    // Read
    route::get('/data-kecamatan', [Admin2Controller::class, 'kecamatan']);
    // Delete
    route::delete('/data-kecamatan/{id}', [Admin2Controller::class, 'hapuskecamatan']);
    // Create
    Route::post('/data-kecamatan/tambah', [Admin2Controller::class, 'tambahkecamatan']);
    // Edit
    Route::get('/data-kecamatan/{id}/edit', [Admin2Controller::class, 'editkecamatan']);
    Route::put('/data-kecamatan/{id}', [Admin2Controller::class, 'ubahkecamatan']);

    // Teknisi*********************************************
    // Read
    route::get('/data-teknisi', [Admin2Controller::class, 'teknisi']);
    // Delete
    route::delete('/data-teknisi/{id}', [Admin2Controller::class, 'hapusteknisi']);
    // Create
    Route::post('/data-teknisi/tambah', [Admin2Controller::class, 'tambahteknisi']);
    // Edit
    Route::get('/data-teknisi/{id}/edit', [Admin2Controller::class, 'editteknisi']);
    Route::put('/data-teknisi/{id}', [Admin2Controller::class, 'ubahteknisi']);

    // Pesanan*********************************************
    // Read
    route::get('/data-pesanan', [Admin2Controller::class, 'pesanan'])->name('pesanan_sendiri');
    // Delete
    route::delete('/data-pesanan/{id}', [Admin2Controller::class, 'hapuspesanan']);
    // Create
    Route::post('/data-pesanan/tambah', [Admin2Controller::class, 'tambahpesanan']);
    // Edit
    Route::get('/data-pesanan/{id}/edit', [Admin2Controller::class, 'editpesanan']);
    Route::put('/data-pesanan/{id}', [Admin2Controller::class, 'ubahpesanan']);
    // Cetak PDF
    Route::get('/surat-tugas/{id}', [Admin2Controller::class, 'cetakpdf']);


    // Pesanan Lain*********************************************
    // Read
    route::get('/data-pesananlain', [Admin2Controller::class, 'pesananlain']);
    // Delete
    route::delete('/data-pesananlain/{id}', [Admin2Controller::class, 'hapuspesananlain']);
    // Create
    Route::post('/data-pesananlain/tambah', [Admin2Controller::class, 'tambahpesananlain']);
    // Edit
    Route::get('/data-pesananlain/{id}/edit', [Admin2Controller::class, 'editpesananlain']);
    Route::put('/data-pesananlain/{id}', [Admin2Controller::class, 'ubahpesananlain']);

    // Waktu Datang*********************************************
    // Read
    route::get('/waktu-datang', [Admin2Controller::class, 'waktudatang']);
    // Delete
    route::delete('/waktu-datang/{id}', [Admin2Controller::class, 'hapuswaktudatang']);
    // Create
    Route::post('/waktu-datang/tambah', [Admin2Controller::class, 'tambahwaktudatang']);
    // Edit
    Route::get('/waktu-datang/{id}/edit', [Admin2Controller::class, 'editwaktudatang']);
    Route::put('/waktu-datang/{id}', [Admin2Controller::class, 'ubahwaktudatang']);

    // Laporan Pesanan
    route::get('/laporan-data-pesanan', [Admin2Controller::class, 'laporanpesanan']);
    route::get('/cetak-laporan-data-pesanan', [Admin2Controller::class, 'cetaklaporanpesanan']);
    // Laporan Pesanan Lain
    route::get('/laporan-data-pesananlain', [Admin2Controller::class, 'laporanpesananlain']);
    route::get('/cetak-laporan-data-pesananlain', [Admin2Controller::class, 'cetaklaporanpesananlain']);
});
