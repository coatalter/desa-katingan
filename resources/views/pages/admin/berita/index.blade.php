@extends('layouts.admin')

@section('title', 'Berita & Pengumuman')
@section('page-title', 'Berita')

@section('content')
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-xl font-bold text-gray-900">Berita & Pengumuman</h1>
            <p class="text-sm text-gray-500">Kelola berita dan pengumuman desa</p>
        </div>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tulis Berita
        </a>
    </div>

    <!-- Filters -->
    <div class="card mb-6">
        <div class="card-body">
            <form method="GET" class="flex flex-wrap gap-3">
                <div class="flex-1 min-w-[200px]">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul berita..."
                        class="input-field">
                </div>
                <select name="kategori" class="input-field w-auto">
                    <option value="">Semua Kategori</option>
                    <option value="Pengumuman" {{ request('kategori') == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                    <option value="Kegiatan" {{ request('kategori') == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                    <option value="Pembangunan" {{ request('kategori') == 'Pembangunan' ? 'selected' : '' }}>Pembangunan
                    </option>
                </select>
                <button type="submit" class="btn btn-secondary">Filter</button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- List -->
    <div class="card">
        <div class="divide-y divide-gray-200">
            @forelse($berita as $b)
                <div class="p-4 hover:bg-gray-50">
                    <div class="flex items-start gap-4">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <h3 class="font-semibold text-gray-900">{{ $b->judul }}</h3>
                                <span class="badge {{ $b->is_published ? 'badge-success' : 'badge-warning' }}">
                                    {{ $b->is_published ? 'Publish' : 'Draft' }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-600 line-clamp-2 mb-2">{{ $b->ringkasan }}</p>
                            <div class="flex items-center gap-4 text-xs text-gray-500">
                                <span class="badge bg-gray-100 text-gray-600">{{ $b->kategori }}</span>
                                <span>{{ $b->author->name ?? 'Admin' }}</span>
                                <span>{{ $b->created_at->format('d M Y') }}</span>
                                <span>{{ $b->views }} views</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-1">
                            <a href="{{ route('admin.berita.edit', $b) }}"
                                class="p-1.5 text-gray-500 hover:text-blue-600 hover:bg-blue-50 rounded" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <form action="{{ route('admin.berita.destroy', $b) }}" method="POST"
                                onsubmit="return confirm('Hapus berita ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-1.5 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded"
                                    title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-8 text-center text-gray-500">
                    <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    <p>Belum ada berita</p>
                </div>
            @endforelse
        </div>

        @if($berita->hasPages())
            <div class="px-4 py-3 border-t border-gray-200">
                {{ $berita->links() }}
            </div>
        @endif
    </div>
@endsection