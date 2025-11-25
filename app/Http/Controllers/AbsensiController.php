<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{

    public function getPertemuan(Request $request)
    {
        $isComplete = $request->filled('tahun') && $request->filled('bulan') && $request->filled('kelas');
        $pertemuan = Jadwal::query()->whereYear('date', $request->tahun)->whereMonth('date', $request->bulan)->where('class_id', $request->kelas)->orderByRaw("CAST(regexp_replace(name, '\\D', '', 'g') AS INTEGER) ASC")->get();
        $kelas = Kelas::orderBy('id', 'desc')->get();

        return view('pages.admin.absensi.pertemuan', [
            'title' => 'Rekap Per Pertemuan',
            'pertemuan' => !$isComplete ? [] : $pertemuan,
            'kelas' => $kelas
        ]);
    }

    public function getDetailPertemuan(string $id)
    {
        $pertemuan = Jadwal::findOrFail($id);
        $siswa = Siswa::where('class_id', $pertemuan->class_id)->get();
        $absensi = Absensi::where('class_id', $pertemuan->class_id)->where('pertemuan_id', $id)->get()->keyBy('siswa_id');

        return view('pages.admin.absensi.detail', [
            'title' => 'Detail Rekap Pertemuan',
            'pertemuan' => $pertemuan,
            'siswa' => $siswa,
            'absensi' => $absensi
        ]);
    }

    public function postPertemuan(string $id, Request $request)
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

    public function getBulan(Request $request)
    {
        $isComplete = $request->filled('tahun') && $request->filled('bulan') && $request->filled('kelas');
        $kelas = Kelas::orderBy('id', 'desc')->get();
        $pertemuan = Jadwal::query()->whereYear('date', $request->tahun)->whereMonth('date', $request->bulan)->where('class_id', $request->kelas)->orderByRaw("CAST(regexp_replace(name, '\\D', '', 'g') AS INTEGER) ASC")->get();
        $siswa = Siswa::where('class_id', $request->kelas)->get();
        $absensi = Absensi::whereIn('siswa_id', $siswa->pluck('id'))->whereIn('pertemuan_id', $pertemuan->pluck('id'))->get();

        $absensiLookup = [];
        foreach ($absensi as $a) {
            $absensiLookup[$a->siswa_id][$a->pertemuan_id] = $a->attendance;
        }

        return view('pages.admin.absensi.bulan', [
            'title' => 'Rekap Per Bulan',
            'pertemuan' => !$isComplete ? [] : $pertemuan,
            'kelas' => $kelas,
            'siswa' => !$isComplete ? [] : $siswa,
            'absensi' => $absensiLookup
        ]);
    }

    public function postBulan(Request $request)
    {
        $request->validate([
            'attendance' => 'array'
        ]);

        $attendance = $request->attendance;
        if (!$attendance) {
            return back()->with('error', 'Tidak ada data absensi yang dikirimkan!');
        }

        foreach ($attendance as $siswa_id => $perPertemuan) {
            foreach ($perPertemuan as $pertemuan_id => $status) {
                if ($status === null || $status === '') {
                    Absensi::where('siswa_id', $siswa_id)
                        ->where('pertemuan_id', $pertemuan_id)
                        ->delete();
                    continue;
                }

                $pertemuan = Jadwal::find($pertemuan_id);
                if (!$pertemuan) continue;
                Absensi::updateOrCreate(
                    [
                        'siswa_id'      => $siswa_id,
                        'class_id'      => $pertemuan->class_id,
                        'pertemuan_id'  => $pertemuan->id,
                        'tutor_id'      => $pertemuan->kelas->tutor_id
                    ],
                    [
                        'attendance' => $status
                    ]
                );
            }
        }

        return back()->with('success', 'Absensi berhasil disimpan!');
    }

    public function getPertemuanTutor(Request $request)
    {
        $isComplete = $request->filled('tahun') && $request->filled('bulan') && $request->filled('kelas');
        $pertemuan = Jadwal::query()->whereYear('date', $request->tahun)->whereMonth('date', $request->bulan)->where('class_id', $request->kelas)->orderByRaw("CAST(regexp_replace(name, '\\D', '', 'g') AS INTEGER) ASC")->get();
        $kelas = Kelas::where('tutor_id', auth()->user()->id)->orderBy('id', 'desc')->get();

        return view('pages.tutor.absensi.pertemuan', [
            'title' => 'Absen Per Pertemuan',
            'pertemuan' => !$isComplete ? [] : $pertemuan,
            'kelas' => $kelas
        ]);
    }

    public function getDetailPertemuanTutor(string $id)
    {
        $pertemuan = Jadwal::findOrFail($id);
        $siswa = Siswa::where('class_id', $pertemuan->class_id)->get();
        $absensi = Absensi::where('class_id', $pertemuan->class_id)->where('pertemuan_id', $id)->get() ->keyBy('siswa_id');

        return view('pages.tutor.absensi.detail', [
            'title' => 'Detail Absensi',
            'pertemuan' => $pertemuan,
            'siswa' => $siswa,
            'absensi' => $absensi
        ]);
    }

    public function postPertemuanTutor(string $id, Request $request)
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

    public function getBulanTutor(Request $request)
    {
        $isComplete = $request->filled('tahun') && $request->filled('bulan') && $request->filled('kelas');
        $kelas = Kelas::where('tutor_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        $pertemuan = Jadwal::query()->whereYear('date', $request->tahun)->whereMonth('date', $request->bulan)->where('class_id', $request->kelas)->orderByRaw("CAST(regexp_replace(name, '\\D', '', 'g') AS INTEGER) ASC")->get();
        $siswa = Siswa::where('class_id', $request->kelas)->get();
        $absensi = Absensi::whereIn('siswa_id', $siswa->pluck('id'))->whereIn('pertemuan_id', $pertemuan->pluck('id'))->get();

        $absensiLookup = [];
        foreach ($absensi as $a) {
            $absensiLookup[$a->siswa_id][$a->pertemuan_id] = $a->attendance;
        }

        return view('pages.tutor.absensi.bulan', [
            'title' => 'Absen Per Bulan',
            'pertemuan' => !$isComplete ? [] : $pertemuan,
            'kelas' => $kelas,
            'siswa' => !$isComplete ? [] : $siswa,
            'absensi' => $absensiLookup
        ]);
    }

    public function postBulanTutor(Request $request)
    {
        $request->validate([
            'attendance' => 'array'
        ]);

        $attendance = $request->attendance;
        if (!$attendance) {
            return back()->with('error', 'Tidak ada data absensi yang dikirimkan!');
        }

        foreach ($attendance as $siswa_id => $perPertemuan) {
            foreach ($perPertemuan as $pertemuan_id => $status) {
                if ($status === null || $status === '') {
                    Absensi::where('siswa_id', $siswa_id)
                        ->where('pertemuan_id', $pertemuan_id)
                        ->delete();
                    continue;
                }

                $pertemuan = Jadwal::find($pertemuan_id);
                if (!$pertemuan) continue;
                Absensi::updateOrCreate(
                    [
                        'siswa_id'      => $siswa_id,
                        'class_id'      => $pertemuan->class_id,
                        'pertemuan_id'  => $pertemuan->id,
                        'tutor_id'      => $pertemuan->kelas->tutor_id
                    ],
                    [
                        'attendance' => $status
                    ]
                );
            }
        }

        return back()->with('success', 'Absensi berhasil disimpan!');
    }
}
