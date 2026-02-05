@extends('layouts.admin')

@section('title', 'Detail Pengajuan')
@section('page-title', 'Detail Pengajuan')

@section('content')
    <div class="max-w-4xl">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.surat.index') }}" class="p-2 hover:bg-gray-100 rounded-lg">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <div>
                    <h1 class="text-xl font-bold text-gray-900">{{ $surat->jenisSurat->nama ?? 'Pengajuan Surat' }}</h1>
                    <p class="text-sm text-gray-500">{{ $surat->nomor_pengajuan }}</p>
                </div>
            </div>
            @php
                $badgeClass = match ($surat->status) {
                    'pending' => 'badge-warning',
                    'verifikasi' => 'badge-verifikasi',
                    'proses' => 'badge-process',
                    'ttd' => 'badge-ttd',
                    'selesai' => 'badge-success',
                    'ditolak' => 'badge-danger',
                    default => 'badge-warning'
                };
            @endphp
            <span class="badge {{ $badgeClass }} text-sm px-3 py-1">{{ $surat->status_label }}</span>
        </div>

        <!-- Flash Message -->
        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid md:grid-cols-2 gap-6 mb-6">
            <!-- Data Pemohon -->
            <div class="card">
                <div class="px-5 py-3 border-b border-gray-200 bg-gray-50">
                    <h3 class="font-semibold text-gray-800">Data Pemohon</h3>
                </div>
                <div class="card-body space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Nama</span>
                        <span class="font-medium">{{ $surat->penduduk->nama ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">NIK</span>
                        <span class="font-mono font-medium">{{ $surat->penduduk->nik ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Alamat</span>
                        <span class="font-medium text-right max-w-[60%]">{{ $surat->penduduk->alamat ?? '-' }}</span>
                    </div>
                </div>
            </div>

            <!-- Data Pengajuan -->
            <div class="card">
                <div class="px-5 py-3 border-b border-gray-200 bg-gray-50">
                    <h3 class="font-semibold text-gray-800">Data Pengajuan</h3>
                </div>
                <div class="card-body space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Jenis Surat</span>
                        <span class="font-medium">{{ $surat->jenisSurat->nama ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Tanggal Pengajuan</span>
                        <span class="font-medium">{{ $surat->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Keperluan</span>
                        <span class="font-medium">{{ $surat->keperluan ?? '-' }}</span>
                    </div>
                    @if($surat->nomor_surat)
                        <div class="flex justify-between">
                            <span class="text-gray-500">Nomor Surat</span>
                            <span class="font-mono font-medium">{{ $surat->nomor_surat }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Data Tambahan -->
        @if($surat->data_tambahan && count($surat->data_tambahan) > 0)
            <div class="card mb-6">
                <div class="px-5 py-3 border-b border-gray-200 bg-gray-50">
                    <h3 class="font-semibold text-gray-800">Data Tambahan</h3>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        @foreach($surat->data_tambahan as $key => $value)
                            @if($value)
                                <div>
                                    <p class="text-gray-500">{{ ucwords(str_replace('_', ' ', $key)) }}</p>
                                    <p class="font-medium text-gray-900">{{ $value }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- Dokumen Pendukung -->
        @if($surat->dokumen_pendukung && count($surat->dokumen_pendukung) > 0)
            <div class="card mb-6">
                <div class="px-5 py-3 border-b border-gray-200 bg-blue-50">
                    <h3 class="font-semibold text-gray-800 flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Dokumen Pendukung ({{ count($surat->dokumen_pendukung) }} file)
                    </h3>
                </div>
                <div class="card-body">
                    <div class="space-y-3">
                        @foreach($surat->dokumen_pendukung as $index => $doc)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border">
                                <div class="flex items-center gap-3">
                                    @php
                                        $ext = pathinfo($doc['name'] ?? '', PATHINFO_EXTENSION);
                                        $isPdf = strtolower($ext) === 'pdf';
                                    @endphp
                                    <div class="w-10 h-10 rounded-lg {{ $isPdf ? 'bg-red-100' : 'bg-blue-100' }} flex items-center justify-center">
                                        @if($isPdf)
                                            <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M14,2H6C4.9,2,4,2.9,4,4v16c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V8L14,2z M14,8V3.5L18.5,8H14z M11.5,17.5 c0,0.83-0.67,1.5-1.5,1.5s-1.5-0.67-1.5-1.5s0.67-1.5,1.5-1.5S11.5,16.67,11.5,17.5z M15,13H9v-1h6V13z M15,15.5H9v-1h6V15.5z"/>
                                            </svg>
                                        @else
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 text-sm">{{ $doc['name'] ?? 'Dokumen ' . ($index + 1) }}</p>
                                        <p class="text-xs text-gray-500">{{ number_format(($doc['size'] ?? 0) / 1024, 1) }} KB</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <a href="{{ Storage::url($doc['path']) }}" target="_blank" 
                                       class="btn btn-sm bg-blue-600 hover:bg-blue-700 text-white">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        Lihat
                                    </a>
                                    <a href="{{ Storage::url($doc['path']) }}" download
                                       class="btn btn-sm btn-secondary">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                        </svg>
                                        Download
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- Catatan -->
        @if($surat->keterangan || $surat->catatan_admin)
            <div class="card mb-6">
                <div class="px-5 py-3 border-b border-gray-200 bg-gray-50">
                    <h3 class="font-semibold text-gray-800">Catatan</h3>
                </div>
                <div class="card-body space-y-3 text-sm">
                    @if($surat->keterangan)
                        <div>
                            <p class="text-gray-500 mb-1">Keterangan Pemohon:</p>
                            <p class="text-gray-700">{{ $surat->keterangan }}</p>
                        </div>
                    @endif
                    @if($surat->catatan_admin)
                        <div>
                            <p class="text-gray-500 mb-1">Catatan Admin:</p>
                            <p class="text-gray-700">{{ $surat->catatan_admin }}</p>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        <!-- Actions -->
        @if(in_array($surat->status, ['pending', 'verifikasi', 'proses', 'ttd']))
            <div class="card">
                <div class="px-5 py-3 border-b border-gray-200 bg-gray-50">
                    <h3 class="font-semibold text-gray-800">Tindakan</h3>
                </div>
                <div class="card-body">
                    @if($surat->status === 'pending')
                         <!-- Pending -> Verifikasi -->
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="border border-blue-200 rounded-lg p-4 bg-blue-50">
                                <h4 class="font-medium text-blue-800 mb-3">Verifikasi Permohonan</h4>
                                <p class="text-sm text-blue-600 mb-4">Pastikan data dan dokumen pemohon sudah lengkap.</p>
                                <form action="{{ route('admin.surat.verify', $surat) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary w-full">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Verifikasi Data
                                    </button>
                                </form>
                            </div>

                             <!-- Reject Form -->
                            <div class="border border-red-200 rounded-lg p-4 bg-red-50">
                                <h4 class="font-medium text-red-800 mb-3">Tolak Pengajuan</h4>
                                <form action="{{ route('admin.surat.reject', $surat) }}" method="POST" class="space-y-3">
                                    @csrf
                                    <div>
                                        <label class="input-label">Alasan Penolakan <span class="text-red-500">*</span></label>
                                        <textarea name="alasan" rows="3" class="input-field"
                                            placeholder="Jelaskan alasan penolakan..." required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-danger w-full">Tolak</button>
                                </form>
                            </div>
                        </div>

                    @elseif($surat->status === 'verifikasi')
                        <!-- Verifikasi -> Proses -->
                         <div class="border border-indigo-200 rounded-lg p-4 bg-indigo-50">
                            <h4 class="font-medium text-indigo-800 mb-3">Mulai Proses Surat</h4>
                            <p class="text-sm text-indigo-600 mb-4">Data telah diverifikasi. Mulai buat surat.</p>
                            <form action="{{ route('admin.surat.proceed', $surat) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary w-full">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                    </svg>
                                    Mulai Proses
                                </button>
                            </form>
                        </div>

                    @elseif($surat->status === 'proses')
                        <!-- Proses -> TTD -->
                         <div class="border border-purple-200 rounded-lg p-4 bg-purple-50">
                            <h4 class="font-medium text-purple-800 mb-3">Ajukan Tanda Tangan</h4>
                            <p class="text-sm text-purple-600 mb-4">Surat telah dibuat. Ajukan ke Kepala Desa untuk TTD.</p>
                            <form action="{{ route('admin.surat.sign', $surat) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary w-full">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                    Minta Tanda Tangan
                                </button>
                            </form>
                        </div>

                    @elseif($surat->status === 'ttd')
                         <!-- TTD -> Selesai -->
                        <div class="border border-green-200 rounded-lg p-4 bg-green-50">
                            <h4 class="font-medium text-green-800 mb-3">Selesaikan Pengajuan</h4>
                            <form action="{{ route('admin.surat.approve', $surat) }}" method="POST" class="space-y-3" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <label class="input-label">Nomor Surat <span class="text-red-500">*</span></label>
                                    <input type="text" name="nomor_surat" class="input-field"
                                        placeholder="Contoh: 001/SKD/II/2026" required>
                                </div>
                                <div>
                                    <label class="input-label">Upload Surat Hasil (PDF)</label>
                                    <input type="file" name="file_hasil" class="input-field bg-white" accept=".pdf,.doc,.docx">
                                    <p class="text-xs text-gray-500 mt-1">Upload surat yang sudah ditandatangani</p>
                                </div>
                                <div>
                                    <label class="input-label">Catatan (opsional)</label>
                                    <textarea name="catatan" rows="2" class="input-field"
                                        placeholder="Catatan tambahan..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary w-full">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Selesaikan & Upload
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        <!-- Processing Info -->
        @if($surat->processedBy && $surat->processed_at)
            <div class="mt-6 text-sm text-gray-500 text-center">
                Diproses oleh {{ $surat->processedBy->name }} pada {{ $surat->processed_at->format('d M Y, H:i') }}
            </div>
        @endif
    </div>
@endsection