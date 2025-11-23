<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TutorController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'tutor')->orderBy('id', 'desc');

        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'ilike', '%' . $search . '%')
                    ->orWhere('degree', 'ilike', '%' . $search . '%')
                    ->orWhere('email', 'ilike', '%' . $search . '%')
                    ->orWhere('phone', 'ilike', '%' . $search . '%');
            });
        }

        $tutor = $query->paginate(10);
        return view('pages.admin.tutor.index', [
            'title' => 'Kelola Tutor',
            'tutor' => $tutor
        ]);
    }

    public function create()
    {
        return view('pages.admin.tutor.create', [
            'title' => 'Tambah Tutor'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'degree' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::create([
            'name' => $request->name,
            'degree' => $request->degree,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'role' => 'tutor',
        ]);

        $filename = 'profile-' . $user->id . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/profile'), $filename);

        User::where('id', $user->id)->update([
            'image' => '/images/profile/' . $filename
        ]);

        return redirect('/admin/tutor')->with('success', 'Berhasil menambahkan tutor!');
    }

    public function edit(string $id)
    {
        $tutor = User::findOrFail($id);
        $kelas = Kelas::where('tutor_id', $id)->get();

        $absensi = Absensi::select(
                'class_id',
                DB::raw("SUM(CASE WHEN attendance = 'H' THEN 1 ELSE 0 END) as hadir"),
                DB::raw("SUM(CASE WHEN attendance = 'S' THEN 1 ELSE 0 END) as sakit"),
                DB::raw("SUM(CASE WHEN attendance = 'I' THEN 1 ELSE 0 END) as izin"),
                DB::raw("SUM(CASE WHEN attendance = 'A' THEN 1 ELSE 0 END) as alpa")
            )
            ->whereIn('class_id', $kelas->pluck('id'))
            ->groupBy('class_id')
            ->get()
            ->keyBy('class_id'); // keyBy supaya gampang akses per kelas

        $totalTutor = [
            'hadir' => 0,
            'sakit' => 0,
            'izin' => 0,
            'alpa' => 0,
            'fee' => 0,
        ];

        foreach ($kelas as $kelasItem) {
            $data = $absensi->get($kelasItem->id);
            $kelasItem->hadir = $data->hadir ?? 0;
            $kelasItem->sakit = $data->sakit ?? 0;
            $kelasItem->izin  = $data->izin  ?? 0;
            $kelasItem->alpa  = $data->alpa  ?? 0;

            // Hitung fee
            $kelasItem->fee = ($kelasItem->hadir * 50000) + (($kelasItem->sakit + $kelasItem->izin) * 25000);

            // Tambahkan ke total tutor
            $totalTutor['hadir'] += $kelasItem->hadir;
            $totalTutor['sakit'] += $kelasItem->sakit;
            $totalTutor['izin']  += $kelasItem->izin;
            $totalTutor['alpa']  += $kelasItem->alpa;
            $totalTutor['fee']   += $kelasItem->fee;
        }

        return view('pages.admin.tutor.edit', [
            'title' => 'Edit Tutor',
            'tutor' => $tutor,
            'kelas' => $kelas,
            'total_tutor' => $totalTutor,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'degree' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'degree' => $request->degree,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        if($request->hasFile('image')) {
            if($user->image != '/images/default.png') {
                File::delete(public_path($user->image));
            }

            $filename = 'profile-' . $user->id . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/profile'), $filename);

            User::where('id', $id)->update([
                'image' => '/images/profile/' . $filename
            ]);
        }

        if($request->password) {
            User::where('id', $id)->update([
                'password' => bcrypt($request->password)
            ]);
        }

        return redirect('/admin/tutor')->with('success', 'Berhasil mengubah tutor!');
    }

    public function destroy(string $id)
    {
        $tutor = User::findOrFail($id);

        File::delete(public_path($tutor->image));

        $tutor->delete();

        return back()->with('success', 'Berhasil menghapus tutor!');
    }
}
