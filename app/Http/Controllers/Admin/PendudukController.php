<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index(Request $request)
    {
        $query = Penduduk::query();

        // Search
        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nik', 'like', "%{$search}%")
                    ->orWhere('no_kk', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($status = $request->get('status')) {
            $query->where('status_penduduk', $status);
        }

        // Filter by jenis kelamin
        if ($jk = $request->get('jk')) {
            $query->where('jenis_kelamin', $jk);
        }

        $penduduk = $query->orderBy('nama')->paginate(15)->withQueryString();

        return view('pages.admin.penduduk.index', compact('penduduk'));
    }

    public function create()
    {
        return view('pages.admin.penduduk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|string|size:16|unique:penduduks,nik',
            'no_kk' => 'nullable|string|size:16',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string',
            'status_perkawinan' => 'required|string',
            'pekerjaan' => 'nullable|string|max:100',
            'pendidikan' => 'nullable|string',
            'alamat' => 'required|string',
            'rt' => 'nullable|string|max:3',
            'rw' => 'nullable|string|max:3',
            'dusun' => 'nullable|string|max:100',
            'is_kepala_keluarga' => 'boolean',
        ]);

        $validated['status_penduduk'] = 'Tetap';
        $validated['is_kepala_keluarga'] = $request->boolean('is_kepala_keluarga');

        Penduduk::create($validated);

        return redirect()->route('admin.penduduk.index')
            ->with('success', 'Data penduduk berhasil ditambahkan');
    }

    public function show(Penduduk $penduduk)
    {
        $penduduk->load([
            'pengajuanSurats' => function ($q) {
                $q->latest()->take(5);
            }
        ]);

        return view('pages.admin.penduduk.show', compact('penduduk'));
    }

    public function edit(Penduduk $penduduk)
    {
        return view('pages.admin.penduduk.edit', compact('penduduk'));
    }

    public function update(Request $request, Penduduk $penduduk)
    {
        $validated = $request->validate([
            'nik' => 'required|string|size:16|unique:penduduks,nik,' . $penduduk->id,
            'no_kk' => 'nullable|string|size:16',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string',
            'status_perkawinan' => 'required|string',
            'pekerjaan' => 'nullable|string|max:100',
            'pendidikan' => 'nullable|string',
            'alamat' => 'required|string',
            'rt' => 'nullable|string|max:3',
            'rw' => 'nullable|string|max:3',
            'dusun' => 'nullable|string|max:100',
            'status_penduduk' => 'required|in:Tetap,Sementara,Pindah,Meninggal',
            'is_kepala_keluarga' => 'boolean',
        ]);

        $validated['is_kepala_keluarga'] = $request->boolean('is_kepala_keluarga');

        $penduduk->update($validated);

        return redirect()->route('admin.penduduk.index')
            ->with('success', 'Data penduduk berhasil diperbarui');
    }

    public function destroy(Penduduk $penduduk)
    {
        $penduduk->delete();

        return redirect()->route('admin.penduduk.index')
            ->with('success', 'Data penduduk berhasil dihapus');
    }
}
