<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Pemilik / Admin
        User::create([
            'name' => 'Pemilik Surabaya Motor',
            'username' => 'admin',
            'role' => 'admin',
            'password' => Hash::make('admin123'), // Password terenkripsi
        ]);

        // 2. Akun Kasir
        User::create([
            'name' => 'Kasir Surabaya Motor',
            'username' => 'kasir',
            'role' => 'kasir',
            'password' => Hash::make('kasir123'),
        ]);
    }
}
