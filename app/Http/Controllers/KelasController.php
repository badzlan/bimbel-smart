<?php namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $query = Kelas::with(['tutor'])
            ->withCount('siswa')
            ->orderBy('id', 'desc');

        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'ilike', '%' . $search . '%')->orWhereHas('tutor', function ($t) use ($search) {
                    $t->where('name', 'ilike', '%' . $search . '%');
                });
            });
        }

        $kelas = $query->paginate(10);
        return view('pages.admin.kelas.index', [
            'title' => 'Kelola Kelas',
            'kelas' => $kelas,
        ]);
    }

    public function create()
    {
        $tutor = User::where('role', 'tutor')->orderBy('id', 'desc')->get();
        $siswa = Siswa::whereNull('class_id')->orderBy('id', 'desc')->get();

        return view('pages.admin.kelas.create', [
            'title' => 'Tambah Kelas',
            'tutor' => $tutor,
            'siswa' => $siswa,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tutor' => 'required',
            'siswa' => 'required',
        ]);

        $kelas = Kelas::create([
            'name' => $request->name,
            'tutor_id' => $request->tutor
        ]);

        foreach ($request->siswa as $siswa) {
            Siswa::where('id', $siswa)->update([
                'class_id' => $kelas->id,
            ]);
        }

        return redirect('/admin/kelas')->with('success', 'Berhasil menambahkan siswa!');
    }

    public function edit(string $id)
    {
        $kelas = Kelas::findOrFail($id);

        $tutor = User::where('role', 'tutor')->orderBy('id', 'desc')->get();

        $siswa = Siswa::where(function ($q) use ($id) {
                    $q->whereNull('class_id')->orWhere('class_id', $id);
                })->orderBy('id', 'desc')->get();

        return view('pages.admin.kelas.edit', [
            'title' => 'Edit Kelas',
            'kelas' => $kelas,
            'tutor' => $tutor,
            'siswa' => $siswa,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'tutor' => 'required',
            'siswa' => 'required',
        ]);

        $kelas = Kelas::findOrFail($id);

        $kelas->update([
            'name' => $request->name,
            'tutor_id' => $request->tutor
        ]);

        $selectedStudents = $request->siswa;
        $currentStudents = $kelas->siswa->pluck('id')->toArray();
        $removeStudents = array_diff($currentStudents, $selectedStudents);
        $addStudents = array_diff($selectedStudents, $currentStudents);

        if (!empty($removeStudents)) {
            Siswa::whereIn('id', $removeStudents)->update([
                'class_id' => null,
            ]);
        }

        if (!empty($addStudents)) {
            Siswa::whereIn('id', $addStudents)->update([
                'class_id' => $kelas->id,
            ]);
        }

        return redirect('/admin/kelas')->with('success', 'Berhasil mengubah kelas!');
    }

    public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id);

        $kelas->delete();

        return back()->with('success', 'Berhasil menghapus kelas!');
    }
}
