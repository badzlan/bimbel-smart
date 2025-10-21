<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getSignin() {
        return view('pages.auth.sign-in', [
            'title' => 'Sign In'
        ]);
    }

    public function postSignin(Request $request) {
        if(!$request->email && !$request->password) {
            return back()->with('error', 'Email dan Password tidak boleh kosong!');
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            if($request->user()->role == 'admin') {
                return redirect('/admin')->with('success', 'Berhasil Sign in Admin!');
            } else {
                return redirect('/tutor')->with('success', 'Berhasil Sign in Tutor!');
            }
        }

        return back()->with('error', 'Email atau Password salah!');
    }

    public function signout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/sign-in')->with('success', 'Berhasil Sign out!');
    }
}
