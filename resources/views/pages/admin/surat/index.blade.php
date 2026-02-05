@extends('layouts.admin')

@section('title', 'Pengajuan Surat')
@section('page-title', 'Pengajuan Surat')

@section('content')
    <!-- Stats -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="stat-card">
            <p class="text-2xl font-bold text-gray-900">{{ $stats['total'] }}</p>
            <p class="text-sm text-gray-500">Total</p>
        </div>
        <div class="stat-card border-l-4 border-l-yellow-500">
            <p class="text-2xl font-bold text-yellow-600">{{ $stats['pending'] }}</p>
            <p class="text-sm text-gray-500">Menunggu</p>
        </div>
        <div class="stat-card border-l-4 border-l-blue-500">
            <p class="text-2xl font-bold text-blue-600">{{ $stats['diproses'] }}</p>
            <p class="text-sm text-gray-500">Diproses</p>
        </div>
        <div class="stat-card border-l-4 border-l-green-500">
            <p class="text-2xl font-bold text-green-600">{{ $stats['selesai'] }}</p>
            <p class="text-sm text-gray-500">Selesai</p>
        </div>
    </div>

    <!-- Filters -->
    <div class="card mb-6">
        <div class="card-body">
            <form method="GET" class="flex flex-wrap gap-3">
                <div class="flex-1 min-w-[200px]">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nomor/nama/NIK..."
                        class="input-field">
                </div>
                <select name="status" class="input-field w-auto">
                    <option value="">Semua Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
                <button type="submit" class="btn btn-secondary">Filter</button>
                @if(request()->hasAny(['search', 'status']))
                    <a href="{{ route('admin.surat.index') }}" class="btn btn-secondary">Reset</a>
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
                        <th>No. Pengajuan</th>
                        <th>Pemohon</th>
                        <th>Jenis Surat</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th class="text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($pengajuan as $p)
                        <tr>
                            <td class="font-mono text-sm">{{ $p->nomor_pengajuan }}</td>
                            <td>
                                <p class="font-medium text-gray-900">{{ $p->penduduk->nama ?? '-' }}</p>
                                <p class="text-xs text-gray-500">{{ $p->penduduk->nik ?? '-' }}</p>
                            </td>
                            <td>{{ $p->jenisSurat->nama ?? '-' }}</td>
                            <td class="text-sm text-gray-500">{{ $p->created_at->format('d M Y') }}</td>
                            <td>
                                @php
                                    $badgeClass = match ($p->status) {
                                        'pending' => 'badge-warning',
                                        'verifikasi' => 'badge-verifikasi',
                                        'proses' => 'badge-process',
                                        'ttd' => 'badge-ttd',
                                        'selesai' => 'badge-success',
                                        'ditolak' => 'badge-danger',
                                        default => 'badge-warning'
                                    };
                                @endphp
                                <span class="badge {{ $badgeClass }}">{{ $p->status_label }}</span>
                            </td>
                            <td class="text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('admin.surat.show', $p) }}"
                                        class="p-1.5 text-gray-500 hover:text-primary-600 hover:bg-primary-50 rounded"
                                        title="Detail">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    @if($p->status === 'pending')
                                        <form action="{{ route('admin.surat.process', $p) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit"
                                                class="p-1.5 text-gray-500 hover:text-blue-600 hover:bg-blue-50 rounded"
                                                title="Proses">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-8 text-gray-500">
                                <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <p>Belum ada pengajuan surat</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($pengajuan->hasPages())
            <div class="px-4 py-3 border-t border-gray-200">
                {{ $pengajuan->links() }}
            </div>
        @endif
    </div>
@endsection