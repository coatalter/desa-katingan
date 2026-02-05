<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Potensi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PotensiController extends Controller
{
    public function index(Request $request)
    {
        $query = Potensi::query();

        if ($search = $request->get('search')) {
            $query->where('nama', 'like', "%{$search}%");
        }

        if ($kategori = $request->get('kategori')) {
            $query->where('kategori', $kategori);
        }

        $potensi = $query->latest()->paginate(12)->withQueryString();

        return view('pages.admin.potensi.index', compact('potensi'));
    }

    public function create()
    {
        return view('pages.admin.potensi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string',
            'alamat' => 'nullable|string',
            'pemilik' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:20',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['nama']);
        $validated['is_active'] = $request->boolean('is_active');

        Potensi::create($validated);

        return redirect()->route('admin.potensi.index')
            ->with('success', 'Potensi desa berhasil ditambahkan');
    }

    public function edit(Potensi $potensis)
    {
        return view('pages.admin.potensi.edit', ['potensi' => $potensis]);
    }

    public function update(Request $request, Potensi $potensis)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string',
            'alamat' => 'nullable|string',
            'pemilik' => 'nullable|string|max:255',
            'kontak' => 'nullable|string|max:20',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $potensis->update($validated);

        return redirect()->route('admin.potensi.index')
            ->with('success', 'Potensi desa berhasil diperbarui');
    }

    public function destroy(Potensi $potensis)
    {
        $potensis->delete();

        return redirect()->route('admin.potensi.index')
            ->with('success', 'Potensi desa berhasil dihapus');
    }
}
