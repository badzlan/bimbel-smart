<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TutorController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with(['kelas'])->where('role', 'tutor')->orderBy('id', 'desc');

        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'ilike', '%' . $search . '%')
                    ->orWhere('degree', 'ilike', '%' . $search . '%')
                    ->orWhere('email', 'ilike', '%' . $search . '%')
                    ->orWhere('phone', 'ilike', '%' . $search . '%')
                    ->orWhereHas('kelas', function ($k) use ($search) {
                        $k->where('name', 'ilike', '%' . $search . '%');
                    });
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
        if(!$request->name || !$request->degree || !$request->email || !$request->phone || !$request->password) {
            return back()->with('error', 'Data tutor tidak boleh kosong!');
        }

        $user = User::create([
            'name' => $request->name,
            'degree' => $request->degree,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'role' => 'tutor',
        ]);

        if($request->hasFile('image')) {
            $filename = 'profile-' . $user->id . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/profile'), $filename);

            User::where('id', $user->id)->update([
                'image' => '/images/profile/' . $filename
            ]);
        }

        return redirect('/admin/tutor')->with('success', 'Berhasil menambahkan tutor!');
    }

    public function edit(string $id)
    {
        $tutor = User::where('id', $id)->first();

        return view('pages.admin.tutor.edit', [
            'title' => 'Edit Tutor',
            'tutor' => $tutor
        ]);
    }

    public function update(Request $request, string $id)
    {
        if(!$request->name || !$request->degree || !$request->email || !$request->phone) {
            return back()->with('error', 'Data tutor tidak boleh kosong!');
        }

        $user = User::where('id', $id)->first();

        $user->update([
            'name' => $request->name,
            'degree' => $request->degree,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        if($request->hasFile('image')) {
            File::delete(public_path($user->image));
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
        $tutor = User::where('id', $id)->first();

        File::delete(public_path($tutor->image));

        $tutor->delete();

        return back()->with('success', 'Berhasil menghapus tutor!');
    }
}
