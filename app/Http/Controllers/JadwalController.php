<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with('kelas')->get()->map(function ($item) {
            return [
                'id'    => $item->id,
                'title' => $item->name . ' | ' . ($item->kelas->name ?? ''),
                'start' => $item->date,
                'extendedProps' => [
                    'name'  => $item->name,
                    'class_id' => $item->class_id
                ]
            ];
        });

        $kelas = Kelas::orderBy('id', 'desc')->get();

        return view('pages.admin.absensi.jadwal', [
            'title' => 'Jadwal Pertemuan',
            'jadwal' => $jadwal,
            'kelas' => $kelas
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'class' => 'required',
        ]);

        Jadwal::create([
            'name' => $request->name,
            'date' => $request->date,
            'class_id' => $request->class,
        ]);

        return redirect('/admin/jadwal')->with('success', 'Berhasil menambahkan jadwal!');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'class' => 'required',
        ]);

        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update([
            'name' => $request->name,
            'date' => $request->date,
            'class_id' => $request->class,
        ]);

        return redirect('/admin/jadwal')->with('success', 'Berhasil mengubah jadwal!');
    }

    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect('/admin/jadwal')->with('success', 'Berhasil menghapus jadwal!');
    }

    public function getTutorJadwal()
    {
        $userId = auth()->user()->id;

        $jadwal = Jadwal::with('kelas')->whereHas('kelas', function ($q) use ($userId) {
            $q->where('tutor_id', $userId);
        })->get()->map(function ($item) {
            return [
                'id'    => $item->id,
                'title' => $item->name . ' | ' . ($item->kelas->name ?? ''),
                'start' => $item->date,
                'extendedProps' => [
                    'name'  => $item->name,
                    'class_id' => $item->class_id
                ]
            ];
        });

        $kelas = Kelas::orderBy('id', 'desc')->get();

        return view('pages.tutor.absensi.jadwal', [
            'title' => 'Jadwal Mengajar',
            'jadwal' => $jadwal,
            'kelas' => $kelas
        ]);
    }
}
