@extends('layouts.admin')

@section('title', 'Detail Penduduk')
@section('page-title', 'Detail Penduduk')

@section('content')
    <div class="max-w-4xl">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.penduduk.index') }}" class="p-2 hover:bg-gray-100 rounded-lg">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <div>
                    <h1 class="text-xl font-bold text-gray-900">{{ $penduduk->nama }}</h1>
                    <p class="text-sm text-gray-500">NIK: {{ $penduduk->nik }}</p>
                </div>
            </div>
            <a href="{{ route('admin.penduduk.edit', $penduduk) }}" class="btn btn-secondary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit
            </a>
        </div>

        <!-- Profile Card -->
        <div class="card mb-6">
            <div class="card-body">
                <div class="flex items-start gap-5">
                    <div class="w-20 h-20 bg-primary-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <span
                            class="text-2xl font-bold text-primary-600">{{ strtoupper(substr($penduduk->nama, 0, 2)) }}</span>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <h2 class="text-xl font-bold text-gray-900">{{ $penduduk->nama }}</h2>
                            @if($penduduk->is_kepala_keluarga)
                                <span class="badge badge-success">Kepala Keluarga</span>
                            @endif
                            <span
                                class="badge {{ $penduduk->status_penduduk == 'Tetap' ? 'badge-success' : 'badge-warning' }}">{{ $penduduk->status_penduduk }}</span>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                            <div>
                                <p class="text-gray-500">Jenis Kelamin</p>
                                <p class="font-medium">{{ $penduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Usia</p>
                                <p class="font-medium">{{ $penduduk->usia }} tahun</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Agama</p>
                                <p class="font-medium">{{ $penduduk->agama }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Status</p>
                                <p class="font-medium">{{ $penduduk->status_perkawinan }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Data Identitas -->
            <div class="card">
                <div class="px-5 py-3 border-b border-gray-200 bg-gray-50">
                    <h3 class="font-semibold text-gray-800">Data Identitas</h3>
                </div>
                <div class="card-body space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-500">NIK</span>
                        <span class="font-mono font-medium">{{ $penduduk->nik }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">No. KK</span>
                        <span class="font-mono font-medium">{{ $penduduk->no_kk ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Tempat, Tgl Lahir</span>
                        <span class="font-medium">{{ $penduduk->tempat_lahir }},
                            {{ $penduduk->tanggal_lahir?->format('d/m/Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Pekerjaan</span>
                        <span class="font-medium">{{ $penduduk->pekerjaan ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Pendidikan</span>
                        <span class="font-medium">{{ $penduduk->pendidikan ?? '-' }}</span>
                    </div>
                </div>
            </div>

            <!-- Alamat -->
            <div class="card">
                <div class="px-5 py-3 border-b border-gray-200 bg-gray-50">
                    <h3 class="font-semibold text-gray-800">Alamat</h3>
                </div>
                <div class="card-body space-y-3 text-sm">
                    <div>
                        <span class="text-gray-500">Alamat Lengkap</span>
                        <p class="font-medium mt-1">{{ $penduduk->alamat_lengkap }}</p>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Dusun</span>
                        <span class="font-medium">{{ $penduduk->dusun ?? '-' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Riwayat Pengajuan -->
        @if($penduduk->pengajuanSurats && $penduduk->pengajuanSurats->count() > 0)
            <div class="card mt-6">
                <div class="px-5 py-3 border-b border-gray-200 bg-gray-50">
                    <h3 class="font-semibold text-gray-800">Riwayat Pengajuan Surat</h3>
                </div>
                <div class="divide-y divide-gray-200">
                    @foreach($penduduk->pengajuanSurats as $surat)
                        <div class="px-5 py-3 flex items-center justify-between">
                            <div>
                                <p class="font-medium text-gray-900">{{ $surat->jenisSurat->nama ?? 'Surat' }}</p>
                                <p class="text-xs text-gray-500">{{ $surat->nomor_pengajuan }} •
                                    {{ $surat->created_at->format('d M Y') }}</p>
                            </div>
                            <span
                                class="badge {{ $surat->status == 'selesai' ? 'badge-success' : ($surat->status == 'pending' ? 'badge-warning' : 'badge-process') }}">
                                {{ ucfirst($surat->status) }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection