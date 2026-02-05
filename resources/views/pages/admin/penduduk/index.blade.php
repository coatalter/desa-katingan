@extends('layouts.admin')

@section('title', 'Data Penduduk')
@section('page-title', 'Data Penduduk')

@section('content')
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-xl font-bold text-gray-900">Data Penduduk</h1>
            <p class="text-sm text-gray-500">Kelola data penduduk desa</p>
        </div>
        <a href="{{ route('admin.penduduk.create') }}" class="btn btn-primary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Penduduk
        </a>
    </div>

    <!-- Filters -->
    <div class="card mb-6">
        <div class="card-body">
            <form method="GET" class="flex flex-wrap gap-3">
                <div class="flex-1 min-w-[200px]">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau NIK..."
                        class="input-field">
                </div>
                <select name="status" class="input-field w-auto">
                    <option value="">Semua Status</option>
                    <option value="Tetap" {{ request('status') == 'Tetap' ? 'selected' : '' }}>Tetap</option>
                    <option value="Sementara" {{ request('status') == 'Sementara' ? 'selected' : '' }}>Sementara</option>
                    <option value="Pindah" {{ request('status') == 'Pindah' ? 'selected' : '' }}>Pindah</option>
                    <option value="Meninggal" {{ request('status') == 'Meninggal' ? 'selected' : '' }}>Meninggal</option>
                </select>
                <select name="jk" class="input-field w-auto">
                    <option value="">L/P</option>
                    <option value="L" {{ request('jk') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ request('jk') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                <button type="submit" class="btn btn-secondary">Filter</button>
                @if(request()->hasAny(['search', 'status', 'jk']))
                    <a href="{{ route('admin.penduduk.index') }}" class="btn btn-secondary">Reset</a>
                @endif
            </form>
        </div>
    </div>

    <!-- Flash Message -->
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table -->
    <div class="card">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>L/P</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th class="text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($penduduk as $p)
                        <tr>
                            <td class="font-mono text-xs">{{ $p->nik }}</td>
                            <td>
                                <div class="flex items-center gap-2">
                                    @if($p->is_kepala_keluarga)
                                        <span
                                            class="w-5 h-5 bg-primary-100 text-primary-600 rounded flex items-center justify-center"
                                            title="Kepala Keluarga">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.715-5.349L11 6.477V16h2a1 1 0 110 2H7a1 1 0 110-2h2V6.477L6.237 7.582l1.715 5.349a1 1 0 01-.285 1.05A3.989 3.989 0 015 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L9 4.323V3a1 1 0 011-1z" />
                                            </svg>
                                        </span>
                                    @endif
                                    <span class="font-medium text-gray-900">{{ $p->nama }}</span>
                                </div>
                            </td>
                            <td>
                                <span
                                    class="inline-flex items-center justify-center w-6 h-6 rounded-full text-xs font-medium {{ $p->jenis_kelamin == 'L' ? 'bg-blue-100 text-blue-700' : 'bg-pink-100 text-pink-700' }}">
                                    {{ $p->jenis_kelamin }}
                                </span>
                            </td>
                            <td>{{ $p->usia }} th</td>
                            <td class="max-w-[200px] truncate" title="{{ $p->alamat_lengkap }}">{{ $p->alamat }}</td>
                            <td>
                                <span
                                    class="badge {{ $p->status_penduduk == 'Tetap' ? 'badge-success' : ($p->status_penduduk == 'Meninggal' ? 'badge-danger' : 'badge-warning') }}">
                                    {{ $p->status_penduduk }}
                                </span>
                            </td>
                            <td class="text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('admin.penduduk.show', $p) }}"
                                        class="p-1.5 text-gray-500 hover:text-primary-600 hover:bg-primary-50 rounded"
                                        title="Lihat">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.penduduk.edit', $p) }}"
                                        class="p-1.5 text-gray-500 hover:text-blue-600 hover:bg-blue-50 rounded" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.penduduk.destroy', $p) }}" method="POST"
                                        onsubmit="return confirm('Hapus data penduduk ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="p-1.5 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded"
                                            title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-8 text-gray-500">
                                <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <p>Belum ada data penduduk</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($penduduk->hasPages())
            <div class="px-4 py-3 border-t border-gray-200">
                {{ $penduduk->links() }}
            </div>
        @endif
    </div>
@endsection