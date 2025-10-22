<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function getProfile() {
        return view('pages.profile.profile', [
            'title' => 'Profile'
        ]);
    }

    public function putProfile(Request $request) {
        if(!$request->name || !$request->degree || !$request->email || !$request->phone) {
            return back()->with('error', 'Data profile tidak boleh kosong!');
        }

        if($request->hasFile('image')) {
            File::delete(public_path(auth()->user()->image));
            $filename = 'profile-' . auth()->user()->id . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/profile'), $filename);

            User::where('id', auth()->user()->id)->update([
                'image' => '/images/profile/' . $filename
            ]);
        }

        User::where('id', auth()->user()->id)->update([
            'name' => $request->name,
            'degree' => $request->degree,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return back()->with('success', 'Berhasil mengubah profile!');
    }
}
