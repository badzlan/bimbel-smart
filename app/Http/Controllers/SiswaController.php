<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Siswa::orderBy('id', 'desc');

        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'ilike', '%' . $search . '%')
                ->orWhere('school', 'ilike', '%' . $search . '%');
            });
        }

        $siswa = $query->paginate(10);
        return view('pages.admin.siswa.index', [
            'title' => 'Kelola Siswa',
            'siswa' => $siswa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.siswa.create', [
            'title' => 'Tambah Siswa'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!$request->name || !$request->school || !$request->enter_date) {
            return back()->with('error', 'Data siswa tidak boleh kosong!');
        }

        Siswa::create([
            'name' => $request->name,
            'school' => $request->school,
            'enter_date' => $request->enter_date
        ]);

        return redirect('/admin/siswa')->with('success', 'Berhasil menambahkan siswa!');
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
        return view('pages.admin.siswa.edit', [
            'title' => 'Edit Siswa'
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
