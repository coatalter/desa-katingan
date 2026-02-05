<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::with('author');

        if ($search = $request->get('search')) {
            $query->where('judul', 'like', "%{$search}%");
        }

        if ($kategori = $request->get('kategori')) {
            $query->where('kategori', $kategori);
        }

        $berita = $query->latest()->paginate(10)->withQueryString();

        return view('pages.admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('pages.admin.berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'required|string|max:500',
            'konten' => 'required|string',
            'kategori' => 'required|string',
            'is_published' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['judul']);
        $validated['author_id'] = auth()->id();
        $validated['is_published'] = $request->boolean('is_published');

        if ($validated['is_published']) {
            $validated['published_at'] = now();
        }

        Berita::create($validated);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit(Berita $beritum)
    {
        return view('pages.admin.berita.edit', ['berita' => $beritum]);
    }

    public function update(Request $request, Berita $beritum)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'required|string|max:500',
            'konten' => 'required|string',
            'kategori' => 'required|string',
            'is_published' => 'boolean',
        ]);

        $validated['is_published'] = $request->boolean('is_published');

        if ($validated['is_published'] && !$beritum->published_at) {
            $validated['published_at'] = now();
        }

        $beritum->update($validated);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(Berita $beritum)
    {
        $beritum->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus');
    }
}
