<?php

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

Route::get('/signin', function () {
    return view('pages.auth.signin', [
        'title' => 'Sign In'
    ]);
});

Route::get('/signout', function () {
    return redirect('/signin');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard', [
        'title' => 'Dashboard'
    ]);
});

Route::get('/profile', function () {
    return view('pages.profile');
});
