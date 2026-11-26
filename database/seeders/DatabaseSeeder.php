<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kamar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin (Pemilik Kost)
        User::create([
            'name' => 'Admin Kost',
            'email' => 'admin@kost.test',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // 2. Akun Penghuni Contoh
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@kost.test',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        // 3. Data Kamar Awal
        Kamar::create([
            'nomor_kamar' => 'A-01',
            'tipe_kamar' => 'Reguler (Kamar Mandi Luar)',
            'harga_bulanan' => 750000,
            'status' => 'tersedia',
            'fasilitas' => 'Kasur, Lemari, Meja Belajar, WiFi',
        ]);

        Kamar::create([
            'nomor_kamar' => 'B-01',
            'tipe_kamar' => 'VIP (Kamar Mandi Dalam + AC)',
            'harga_bulanan' => 1350000,
            'status' => 'tersedia',
            'fasilitas' => 'Kasur Springbed, Lemari, AC, Kamar Mandi Dalam, WiFi',
        ]);
    }
}