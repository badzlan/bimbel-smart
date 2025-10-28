<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Kelas::with(['tutor'])->withCount('siswa')->orderBy('id', 'desc');

        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'ilike', '%' . $search . '%')
                ->orWhere('school', 'ilike', '%' . $search . '%');
            });
        }

        $kelas = $query->paginate(10);
        return view('pages.admin.kelas.index', [
            'title' => 'Kelola Kelas',
            'kelas' => $kelas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tutor = User::where('role', 'tutor')->whereNull('class_id')->orderBy('id', 'desc')->get();
        $siswa = Siswa::whereNull('class_id')->orderBy('id', 'desc')->get();

        return view('pages.admin.kelas.create', [
            'title' => 'Tambah Kelas',
            'tutor' => $tutor,
            'siswa' => $siswa
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!$request->name || !$request->tutor || !$request->siswa) {
            return back()->with('error', 'Data kelas tidak boleh kosong!');
        }

        $kelas = Kelas::create([
            'name' => $request->name,
        ]);

        User::where('id', $request->tutor)->update([
            'class_id' => $kelas->id
        ]);

        foreach ($request->siswa as $siswa) {
            Siswa::where('id', $siswa)->update([
                'class_id' => $kelas->id
            ]);
        }

        return redirect('/admin/kelas')->with('success', 'Berhasil menambahkan siswa!');
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
        return view('pages.admin.kelas.edit', [
            'title' => 'Edit Kelas'
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
