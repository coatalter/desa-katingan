<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri = Galeri::latest()->paginate(10);
        return view('pages.admin.galeri.index', compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('gambar')) {
            $input['gambar'] = $image->store('galeri', 'public');
        }

        Galeri::create($input);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Foto berhasil ditambahkan ke galeri');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galeri $galeri)
    {
        return view('pages.admin.galeri.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->except(['gambar']);

        if ($image = $request->file('gambar')) {
            $input['gambar'] = $image->store('galeri', 'public');
        }

        // Handle is_active toggle if not present in request (unchecked checkbox)
        $input['is_active'] = $request->has('is_active');

        $galeri->update($input);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Info galeri berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $galeri)
    {
        $galeri->delete();
        return redirect()->route('admin.galeri.index')
            ->with('success', 'Foto berhasil dihapus');
    }
}
