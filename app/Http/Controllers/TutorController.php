<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.tutor.index', [
            'title' => 'Kelola Tutor'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.tutor.create', [
            'title' => 'Tambah Tutor'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!$request->name || !$request->degree || !$request->email || !$request->phone || !$request->password) {
            return back()->with('error', 'Data tutor tidak boleh kosong!');
        }

        User::create([
            'name' => $request->name,
            'degree' => $request->degree,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'role' => 'tutor',
        ]);

        return redirect('/admin/tutor')->with('success', 'Berhasil menambahkan tutor!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.admin.tutor.edit', [
            'title' => 'Edit Tutor'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
