<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TutorController;
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
    return redirect('/sign-in');
});

// Auth

Route::middleware(['guest'])->group(function () {
    Route::get('/sign-in', [AuthController::class, 'getSignin'])->name('signin');
    Route::post('/sign-in', [AuthController::class, 'postSignin']);
});

Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
        return view('pages.admin.dashboard', [
            'title' => 'Dashboard'
        ]);
    });

    Route::resource('/kelas', ClassController::class);
    Route::resource('/tutor', TutorController::class);
    Route::resource('/siswa', SiswaController::class);

    Route::get('/pertemuan', function () {
        return view('pages.admin.absensi.pertemuan', [
            'title' => 'Rekap Per Pertemuan'
        ]);
    });

    Route::get('/pertemuan/detail', function () {
        return view('pages.admin.absensi.detail', [
            'title' => 'Rekap Pertemuan Detail'
        ]);
    });

    Route::get('/bulan', function () {
        return view('pages.admin.absensi.bulan', [
            'title' => 'Rekap Per Bulan'
        ]);
    });

    Route::resource('/sesi', SesiController::class);

    Route::get('/fee', function () {
        return view('pages.admin.fee', [
            'title' => 'Total Fee Tutor'
        ]);
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/signout', [AuthController::class, 'signout']);
});


Route::get('/profile', function () {
    return view('pages.profile', [
        'title' => 'Profile'
    ]);
});
