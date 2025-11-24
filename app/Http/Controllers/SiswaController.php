<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::with(['kelas'])->orderBy('id', 'desc');

        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'ilike', '%' . $search . '%')
                ->orWhere('school', 'ilike', '%' . $search . '%')
                ->orWhereHas('kelas', function ($k) use ($search) {
                    $k->where('name', 'ilike', '%' . $search . '%');
                });
            });
        }

        $siswa = $query->paginate(10);
        return view('pages.admin.siswa.index', [
            'title' => 'Kelola Siswa',
            'siswa' => $siswa
        ]);
    }
    public function create()
    {
        $kelas = Kelas::orderBy('id', 'desc')->get();

        return view('pages.admin.siswa.create', [
            'title' => 'Tambah Siswa',
            'kelas' => $kelas
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'school' => 'required',
            'enter_date' => 'required',
            'kelas' => 'required'
        ]);

        Siswa::create([
            'name' => $request->name,
            'school' => $request->school,
            'enter_date' => $request->enter_date,
            'class_id' => $request->kelas,
        ]);

        return redirect('/admin/siswa')->with('success', 'Berhasil menambahkan siswa!');
    }

    public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::orderBy('id', 'desc')->get();

        return view('pages.admin.siswa.edit', [
            'title' => 'Edit Siswa',
            'siswa' => $siswa,
            'kelas' => $kelas
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'school' => 'required',
            'enter_date' => 'required'
        ]);

        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'name' => $request->name,
            'school' => $request->school,
            'enter_date' => $request->enter_date
        ]);

        return redirect('/admin/siswa')->with('success', 'Berhasil mengubah siswa!');
    }

    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

        return back()->with('success', 'Berhasil menghapus siswa!');
    }
}
