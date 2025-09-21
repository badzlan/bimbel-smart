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
    return redirect('/dashboard');
});

// Auth

Route::middleware(['guest'])->group(function () {
    Route::get('/signin', [AuthController::class, 'getSignin'])->name('signin');
    Route::post('/signin', [AuthController::class, 'postSignin']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/signout', [AuthController::class, 'signout']);
    Route::get('/dashboard', function () {
        return view('pages.dashboard', [
            'title' => 'Dashboard'
        ]);
    });
});


Route::get('/forgot-password', function () {
    return view('pages.auth.forgot-password', [
        'title' => 'Forgot Password'
    ]);
});

// Admin


Route::get('/profile', function () {
    return view('pages.profile', [
        'title' => 'Profile'
    ]);
});
