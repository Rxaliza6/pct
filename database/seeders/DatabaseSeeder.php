<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Waktu;
use App\Models\Teknisi;
use App\Models\Kecamatan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Kecamatan::create([
            'kecamatan' => 'Pontianak Kota'
        ]);
        Kecamatan::create([
            'kecamatan' => 'Pontianak Barat'
        ]);
        Kecamatan::create([
            'kecamatan' => 'Pontianak Timur'
        ]);
        Kecamatan::create([
            'kecamatan' => 'Pontianak Utara'
        ]);
        Kecamatan::create([
            'kecamatan' => 'Pontianak Selatan'
        ]);
        Kecamatan::create([
            'kecamatan' => 'Pontianak Tenggara'
        ]);

        User::create([
            'role' => 'Pengunjung',
            'nama' => 'User',
            'no_hp' => '123456789098',
            'kecamatan_id' => '1',
            'alamat' => 'Jl. User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user')
        ]);
        User::create([
            'role' => 'Admin',
            'nama' => 'Admin',
            'no_hp' => 'admin',
            'kecamatan_id' => '1',
            'alamat' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ]);

        Waktu::create([
            'waktu_datang' => '07.00 - 09.00'
        ]);
        Waktu::create([
            'waktu_datang' => '10.00 - 12.00'
        ]);
        Waktu::create([
            'waktu_datang' => '13.00 - 15.00'
        ]);
        Waktu::create([
            'waktu_datang' => '16.00 - 18.00'
        ]);
    }
}
