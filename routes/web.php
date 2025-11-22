<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProfileController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/sign-in', [AuthController::class, 'getSignin'])->name('signin');
    Route::post('/sign-in', [AuthController::class, 'postSignin']);

    Route::get('/forgot-password', [AuthController::class, 'getForgotPassword']);
});

Route::middleware(['auth.admin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/', [DashboardController::class, 'adminDashboard']);
        Route::get('/fee', [DashboardController::class, 'feeAdmin']);

        Route::resource('/tutor', TutorController::class);
        Route::resource('/siswa', SiswaController::class);
        Route::resource('/kelas', KelasController::class);

        Route::resource('/jadwal', JadwalController::class);
        Route::get('/pertemuan', [AbsensiController::class, 'getAbsensi']);
        Route::get('/pertemuan/{id}', [AbsensiController::class, 'getDetailAbsensi']);
        Route::post('/pertemuan/{id}', [AbsensiController::class, 'postAbsensi']);

        Route::get('/bulan', function () {
            return view('pages.admin.absensi.bulan', [
                'title' => 'Rekap Per Bulan'
            ]);
        });
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'getProfile']);
    Route::put('/profile', [ProfileController::class, 'putProfile']);

    Route::get('/signout', [AuthController::class, 'signout']);

    Route::prefix('/tutor')->group(function () {
        Route::get('/', [DashboardController::class, 'tutorDashboard']);

        Route::get('/kelas', function () {
            return view('pages.tutor.kelas.index', [
                'title' => 'Kelas Saya'
            ]);
        });

        Route::get('/jadwal', function () {
            return view('pages.tutor.absensi.jadwal', [
                'title' => 'Jadwal Mengajar'
            ]);
        });

    });
});
