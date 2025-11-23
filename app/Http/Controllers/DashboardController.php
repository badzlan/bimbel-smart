<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $total_tutor = User::where('role', 'tutor')->count();
        $total_siswa = Siswa::count();
        $total_kelas = Kelas::count();

        return view('pages.admin.dashboard', [
            'title' => 'Dashboard',
            'total_tutor' => $total_tutor,
            'total_siswa' => $total_siswa,
            'total_kelas' => $total_kelas
        ]);
    }

    public function tutorDashboard()
    {
        return view('pages.tutor.dashboard', [
            'title' => 'Dashboard Tutor'
        ]);
    }

    public function feeTutor()
    {
        return view('pages.admin.fee', [
            'title' => 'Total Fee Tutor'
        ]);
    }
}
