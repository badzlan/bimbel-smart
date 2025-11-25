<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Absensi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = fake('id_ID');
        $currentYear = date('Y');

        // ==========================================
        // 1. DATA USER (TUTOR & ADMIN)
        // ==========================================
        $users = [
            [
                'image' => '/images/admin.jpg',
                'name' => 'Super Admin',
                'degree' => 'Ad.Min.',
                'email' => 'admin@gmail.com',
                'phone' => '081234567890',
                'role' => 'admin',
                'password' => Hash::make('12345678'),
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'image' => '/images/default.png',
                'name' => 'Badzlan',
                'degree' => 'S.Tr.Kom., M.Kom.',
                'email' => 'badzlan@gmail.com',
                'phone' => '081234567890',
                'role' => 'tutor',
                'password' => Hash::make('12345678'),
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'image' => '/images/default.png',
                'name' => 'Ajip',
                'degree' => 'S.E.',
                'email' => 'ajip@gmail.com',
                'phone' => '081234567890',
                'role' => 'tutor',
                'password' => Hash::make('12345678'),
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'image' => '/images/default.png',
                'name' => 'Adit',
                'degree' => 'S.Komp.',
                'email' => 'adit@gmail.com',
                'phone' => '081234567890',
                'role' => 'tutor',
                'password' => Hash::make('12345678'),
                'created_at' => now(), 'updated_at' => now(),
            ],
        ];
        User::insert($users);

        // ==========================================
        // 2. DATA KELAS
        // ==========================================
        $kelasData = [
            ['name' => 'Kelas 6A', 'tutor_id' => 2],
            ['name' => 'Kelas 9B', 'tutor_id' => 3],
            ['name' => 'English Class', 'tutor_id' => 2],
            ['name' => 'Coding Dasar', 'tutor_id' => 4],
            ['name' => 'Matematika', 'tutor_id' => 3],
        ];

        foreach ($kelasData as $k) {
            Kelas::create($k);
        }

        // ==========================================
        // 3. DATA SISWA (5-10 SISWA PER KELAS)
        // ==========================================
        $allKelas = Kelas::all();

        foreach ($allKelas as $kelas) {
            // Tentukan jumlah siswa acak antara 5 sampai 10 untuk kelas ini
            $jumlahSiswa = rand(5, 10);

            for ($i = 0; $i < $jumlahSiswa; $i++) {
                Siswa::create([
                    'name' => $faker->name(),
                    'school' => 'SMA ' . $faker->city(),
                    'enter_date' => now()->subMonths(rand(1, 12)),
                    'class_id' => $kelas->id
                ]);
            }
        }

        // ==========================================
        // 4. GENERATE JADWAL & ABSENSI (JAN - DES)
        // ==========================================
        $this->command->info('Sedang men-generate 10 pertemuan per kelas, per bulan...');

        $absensiBatch = [];

        // Loop Bulan (1 - 12)
        for ($bulan = 1; $bulan <= 12; $bulan++) {

            // Loop Setiap Kelas (Supaya semua kelas punya jatah sama)
            foreach ($allKelas as $kelasItem) {

                // Loop 10 Pertemuan per Kelas per Bulan
                for ($pertemuanKe = 1; $pertemuanKe <= 10; $pertemuanKe++) {

                    // Tentukan Tanggal & Jam Acak di bulan tersebut
                    // Tanggal 1 s.d 28 (biar aman)
                    $tanggalRandom = rand(1, 28);
                    $jamRandom = rand(8, 16);

                    $waktuPertemuan = Carbon::create($currentYear, $bulan, $tanggalRandom, $jamRandom, 0, 0);

                    // Buat Jadwal
                    $jadwal = Jadwal::create([
                        'name' => 'Pertemuan ' . $pertemuanKe, // Sesuai Request: Pertemuan 1 - 10
                        'date' => $waktuPertemuan->format('Y-m-d'),
                        'class_id' => $kelasItem->id,
                        'created_at' => $waktuPertemuan,
                        'updated_at' => $waktuPertemuan,
                    ]);

                    // Absensi Siswa di Kelas tersebut
                    $siswas = Siswa::where('class_id', $kelasItem->id)->get();

                    foreach ($siswas as $siswa) {
                        // Logika Probabilitas (Hadir Dominan)
                        $rand = rand(1, 100);
                        if ($rand <= 75) { $status = 'H'; }
                        elseif ($rand <= 85) { $status = 'S'; }
                        elseif ($rand <= 95) { $status = 'I'; }
                        else { $status = 'A'; }

                        $absensiBatch[] = [
                            'attendance' => $status,
                            'pertemuan_id' => $jadwal->id,
                            'class_id' => $kelasItem->id,
                            'siswa_id' => $siswa->id,
                            'tutor_id' => $kelasItem->tutor_id,
                            'created_at' => $waktuPertemuan,
                            'updated_at' => $waktuPertemuan,
                        ];
                    }
                }
            }
        }

        // Insert Batch (dibagi per 1000 baris biar tidak error memory limit)
        foreach (array_chunk($absensiBatch, 1000) as $chunk) {
            Absensi::insert($chunk);
        }

        echo "✅ Seeding selesai! Setiap kelas memiliki tepat 10 pertemuan dari Jan-Des.";
    }
}
