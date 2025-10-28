<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'image' => '/images/admin.jpg',
            'name' => 'Super Admin',
            'degree' => 'S.Tr.Kom., M.Kom.',
            'email' => 'admin@gmail.com',
            'phone' => '081234567890',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
        ]);

        $kelasList = [];
        foreach (range(1, 12) as $i) {
            $maxVariant = rand(1, 3); // A, AB, atau ABC
            foreach (range('A', chr(ord('A') + $maxVariant - 1)) as $suffix) {
                $kelasList[] = "Kelas {$i}{$suffix}";
            }
        }

        foreach ($kelasList as $kelasName) {
            Kelas::create(['name' => $kelasName]);
        }

        $allKelas = Kelas::all();

        $firstNames = ['Andi', 'Budi', 'Citra', 'Dewi', 'Eko', 'Fajar', 'Gita', 'Hendra', 'Indah', 'Joko', 'Kiki', 'Lina', 'Maya', 'Nanda', 'Oka', 'Putri', 'Rafi', 'Sinta', 'Toni', 'Vina'];
        $lastNames = ['Santoso', 'Wijaya', 'Saputra', 'Pratama', 'Utami', 'Halim', 'Rahman', 'Syahputra', 'Anggraini', 'Susilo', 'Kurniawan', 'Firmansyah'];
        $degrees = ['S.Kom.', 'M.Kom.', 'S.Pd.', 'S.T.', 'M.Sc.', 'S.Si.', 'Dr.', 'S.E.'];
        $schools = ['SMA Negeri', 'SMK Negeri', 'MAN', 'SMA Swasta', 'SMK Swasta'];

        for ($i = 1; $i <= 45; $i++) {
            $name = $firstNames[array_rand($firstNames)] . ' ' . $lastNames[array_rand($lastNames)];
            $email = strtolower(str_replace(' ', '', $name)) . rand(100, 999) . '@mail.com';
            $degree = $degrees[array_rand($degrees)];
            $phone = '08' . rand(1000000000, 9999999999);

            User::create([
                'image' => '/images/logo.png',
                'name' => $name,
                'degree' => $degree,
                'email' => $email,
                'phone' => $phone,
                'role' => 'tutor',
                'password' => Hash::make('12345678'),
                'class_id' => $allKelas->random()->id,
            ]);
        }

        for ($i = 1; $i <= 45; $i++) {
            $name = $firstNames[array_rand($firstNames)] . ' ' . $lastNames[array_rand($lastNames)];
            $school = $schools[array_rand($schools)] . ' ' . rand(1, 10);
            $enter_date = Carbon::now()->subYears(rand(0, 3))->subMonths(rand(0, 12));
            $class = $allKelas->random();

            Siswa::create([
                'name' => $name,
                'school' => $school,
                'enter_date' => $enter_date,
                'class_id' => $class->id,
            ]);
        }

        echo "✅ Seeding selesai";
    }
}
