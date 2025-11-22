<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        return view('pages.admin.dashboard', [
            'title' => 'Dashboard'
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
