<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return redirect('/signin');
});

// Auth

Route::middleware(['guest'])->group(function () {
    Route::get('/signin', [AuthController::class, 'getSignin'])->name('signin');
    Route::post('/signin', [AuthController::class, 'postSignin']);
});

Route::middleware(['auth'])->prefix('/admin')->group(function () {
    Route::get('/', function () {
        return redirect('/admin/dashboard');
    });

    Route::get('/dashboard', function () {
        return view('pages.admin.dashboard', [
            'title' => 'Dashboard'
        ]);
    });

    Route::get('/kelola-kelas', function () {
        return view('pages.admin.kelola-kelas', [
            'title' => 'Kelola Kelas'
        ]);
    });

    Route::get('/kelola-tutor', function () {
        return view('pages.admin.kelola-tutor', [
            'title' => 'Kelola Tutor'
        ]);
    });

    Route::get('/kelola-siswa', function () {
        return view('pages.admin.kelola-siswa', [
            'title' => 'Kelola Siswa'
        ]);
    });

    Route::get('/rekap-absensi', function () {
        return view('pages.admin.rekap-absensi', [
            'title' => 'Rekap Absensi Siswa'
        ]);
    });

    Route::get('/total-fee', function () {
        return view('pages.admin.total-fee', [
            'title' => 'Total Fee Tutor'
        ]);
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/signout', [AuthController::class, 'signout']);
});


Route::get('/forgot-password', function () {
    return view('pages.auth.forgot-password', [
        'title' => 'Forgot Password'
    ]);
});


Route::get('/profile', function () {
    return view('pages.profile', [
        'title' => 'Profile'
    ]);
});
