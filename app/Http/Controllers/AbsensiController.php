<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{

    public function getAbsensi(Request $request)
    {

        $isComplete = $request->filled('tahun') && $request->filled('bulan') && $request->filled('kelas');
        $pertemuan = Jadwal::query()->whereYear('date', $request->tahun)->whereMonth('date', $request->bulan)->where('class_id', $request->kelas)->orderBy('name', 'asc')->get();
        $kelas = Kelas::all();

        return view('pages.admin.absensi.pertemuan', [
            'title' => 'Rekap Per Pertemuan',
            'pertemuan' => !$isComplete ? [] : $pertemuan,
            'kelas' => $kelas
        ]);
    }

    public function getDetailAbsensi(string $id, Request $request)
    {
        $pertemuan = Jadwal::findOrFail($id);
        $siswa = Siswa::where('class_id', $pertemuan->class_id)->get();

        $absensi = Absensi::where('class_id', $pertemuan->class_id)
            ->where('pertemuan_id', $id)
            ->get()
            ->keyBy('siswa_id');


        return view('pages.admin.absensi.detail', [
            'title' => 'Detail Rekap Pertemuan',
            'pertemuan' => $pertemuan,
            'siswa' => $siswa,
            'absensi' => $absensi
        ]);
    }

    public function postAbsensi(string $id, Request $request)
    {
        $pertemuan = Jadwal::findOrFail($id);
        $attendance = $request->attendance;

        foreach ($attendance as $siswa_id => $value) {

            Absensi::updateOrCreate(
                [
                    'siswa_id' => $siswa_id,
                    'class_id' => $pertemuan->class_id,
                    'pertemuan_id' => $pertemuan->id,
                    'tutor_id' => $pertemuan->kelas->tutor_id
                ],
                [
                    'attendance' => $value
                ]
            );
        }

        return back()->with('success', 'Absensi berhasil disimpan!');
    }

}
