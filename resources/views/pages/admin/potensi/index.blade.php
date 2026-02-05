@extends('layouts.admin')

@section('title', 'Potensi Desa')
@section('page-title', 'Potensi Desa')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-xl font-bold text-gray-900">Potensi Desa</h1>
            <p class="text-sm text-gray-500">UMKM, Wisata, dan potensi lain</p>
        </div>
        <a href="{{ route('admin.potensi.create') }}" class="btn btn-primary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Potensi
        </a>
    </div>

    <div class="card mb-6">
        <div class="card-body">
            <form method="GET" class="flex flex-wrap gap-3">
                <div class="flex-1 min-w-[200px]">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari potensi..."
                        class="input-field">
                </div>
                <select name="kategori" class="input-field w-auto">
                    <option value="">Semua Kategori</option>
                    @foreach(['Kuliner', 'Kerajinan', 'Wisata', 'Pertanian', 'Peternakan', 'Perdagangan'] as $kat)
                        <option value="{{ $kat }}" {{ request('kategori') == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                    @endforeach
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

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse($potensi as $p)
            <div class="card">
                <div class="card-body">
                    <div class="flex items-start justify-between mb-3">
                        <div>
                            <h3 class="font-semibold text-gray-900">{{ $p->nama }}</h3>
                            <span class="badge bg-primary-100 text-primary-700">{{ $p->kategori }}</span>
                        </div>
                        <span class="w-2 h-2 rounded-full {{ $p->is_active ? 'bg-green-500' : 'bg-gray-300' }}"></span>
                    </div>
                    <p class="text-sm text-gray-600 line-clamp-2 mb-3">{{ $p->deskripsi }}</p>
                    <div class="text-xs text-gray-500 space-y-1">
                        @if($p->pemilik)
                        <p>👤 {{ $p->pemilik }}</p>@endif
                        @if($p->alamat)
                        <p class="truncate">📍 {{ $p->alamat }}</p>@endif
                    </div>
                    <div class="flex items-center justify-end gap-1 mt-3 pt-3 border-t border-gray-100">
                        <a href="{{ route('admin.potensi.edit', $p) }}"
                            class="p-1.5 text-gray-500 hover:text-blue-600 hover:bg-blue-50 rounded">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                        <form action="{{ route('admin.potensi.destroy', $p) }}" method="POST"
                            onsubmit="return confirm('Hapus potensi ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="p-1.5 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded">
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
            <div class="col-span-full card">
                <div class="card-body text-center py-8 text-gray-500">
                    <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <p>Belum ada data potensi</p>
                </div>
            </div>
        @endforelse
    </div>

    @if($potensi->hasPages())
        <div class="mt-6">
            {{ $potensi->links() }}
        </div>
    @endif
@endsection