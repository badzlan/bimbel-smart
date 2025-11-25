<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $total_tutor = User::where('role', 'tutor')->count();
        $total_siswa = Siswa::count();
        $total_kelas = Kelas::count();

        $currentYear = date('Y');
        $currentMonth = date('m');

        $absensiStats = Absensi::selectRaw('EXTRACT(MONTH FROM created_at) as month, attendance, COUNT(*) as total')
            ->whereYear('created_at', $currentYear)
            ->groupBy('month', 'attendance')
            ->get();

        $dataChart = [
            'H' => array_fill(0, 12, 0),
            'S' => array_fill(0, 12, 0),
            'I' => array_fill(0, 12, 0),
            'A' => array_fill(0, 12, 0),
        ];

        foreach ($absensiStats as $stat) {
            $bulanIndex = (int)$stat->month - 1;
            if (isset($dataChart[$stat->attendance])) {
                $dataChart[$stat->attendance][$bulanIndex] = $stat->total;
            }
        }

        $monthStats = [
            'H' => 0,
            'S' => 0,
            'I' => 0,
            'A' => 0
        ];

        $currentMonthData = Absensi::selectRaw('attendance, COUNT(*) as total')
            ->whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->groupBy('attendance')
            ->get();

        foreach ($currentMonthData as $data) {
            if (isset($monthStats[$data->attendance])) {
                $monthStats[$data->attendance] = $data->total;
            }
        }

        $donutData = [
            $monthStats['H'],
            $monthStats['S'],
            $monthStats['I'],
            $monthStats['A']
        ];

        $absensiStats = Absensi::select(
            'class_id',
            DB::raw("SUM(CASE WHEN attendance = 'H' THEN 1 ELSE 0 END) as hadir"),
            DB::raw("SUM(CASE WHEN attendance = 'S' THEN 1 ELSE 0 END) as sakit"),
            DB::raw("SUM(CASE WHEN attendance = 'I' THEN 1 ELSE 0 END) as izin")
            // Alpa tidak perlu dihitung karena fee-nya 0
        )
        ->whereYear('created_at', $currentYear)
        ->whereMonth('created_at', $currentMonth)
        ->groupBy('class_id')
        ->get()
        ->keyBy('class_id'); // Key array berdasarkan class_id agar mudah dicari

        $absensiStats = Absensi::select(
            'class_id',
            DB::raw("SUM(CASE WHEN attendance = 'H' THEN 1 ELSE 0 END) as hadir"),
            DB::raw("SUM(CASE WHEN attendance = 'S' THEN 1 ELSE 0 END) as sakit"),
            DB::raw("SUM(CASE WHEN attendance = 'I' THEN 1 ELSE 0 END) as izin")
        )
        // ->whereYear('created_at', '2025')
        // ->whereMonth('created_at', '11')
        ->groupBy('class_id')
        ->get()
        ->keyBy('class_id');

        $tutors = User::where('role', 'tutor')->with('kelas')->get();

        $tutorFees = $tutors->map(function($tutor) use ($absensiStats) {
            $totalFee = 0;

            foreach ($tutor->kelas as $kelas) {
                if (isset($absensiStats[$kelas->id])) {
                    $stats = $absensiStats[$kelas->id];
                    $hadir = $stats->hadir;
                    $sakitIzin = $stats->sakit + $stats->izin;

                    $totalFee += ($hadir * 50000) + ($sakitIzin * 25000);
                }
            }

            return [
                'id' => $tutor->id,
                'name' => $tutor->name,
                'image' => $tutor->image,
                'total_fee_raw' => $totalFee,
                'total_fee_formatted' => 'Rp ' . number_format($totalFee, 0, ',', '.')
            ];
        });

        $tutorFees = $tutorFees->sortByDesc('total_fee_raw');

        return view('pages.admin.dashboard', [
            'title' => 'Dashboard',
            'total_tutor' => $total_tutor,
            'total_siswa' => $total_siswa,
            'total_kelas' => $total_kelas,

            'chartHadir' => $dataChart['H'],
            'chartSakit' => $dataChart['S'],
            'chartIzin'  => $dataChart['I'],
            'chartAlpa'  => $dataChart['A'],

            'donutData'  => $donutData,

            'tutorFees' => $tutorFees
        ]);
    }

    public function tutorDashboard()
    {
        return view('pages.tutor.dashboard', [
            'title' => 'Dashboard Tutor'
        ]);
    }

    public function feeAdmin()
    {
        return view('pages.admin.fee', [
            'title' => 'Total Fee Tutor'
        ]);
    }
}
