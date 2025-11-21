<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::insert([
            [
                'image' => '/images/admin.jpg',
                'name' => 'Super Admin',
                'degree' => 'Ad.Min.',
                'email' => 'admin@gmail.com',
                'phone' => '081234567890',
                'role' => 'admin',
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => '/images/default.png',
                'name' => 'Badzlan',
                'degree' => 'S.Tr.Kom., M.Kom.',
                'email' => 'badzlan@gmail.com',
                'phone' => '081234567890',
                'role' => 'tutor',
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => '/images/default.png',
                'name' => 'ajip',
                'degree' => 'S.E.',
                'email' => 'ajip@gmail.com',
                'phone' => '081234567890',
                'role' => 'tutor',
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => '/images/default.png',
                'name' => 'adit',
                'degree' => 'S.Komp.',
                'email' => 'adit@gmail.com',
                'phone' => '081234567890',
                'role' => 'tutor',
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Siswa::insert([
            [
                'name' => 'upay',
                'school' => 'SMA Borces',
                'enter_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'cey',
                'school' => 'SMA Cibubur',
                'enter_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'radid',
                'school' => 'SMK Kampak',
                'enter_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Kelas::insert([
            [
                'name' => 'Kelas 6A',
                'tutor_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kelas 9B',
                'tutor_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'English Class',
                'tutor_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        echo "✅ Seeding selesai";
    }
}
