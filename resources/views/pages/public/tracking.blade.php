@extends('layouts.public')

@section('title', 'Lacak Pengajuan')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-primary-600 to-primary-800 py-16 lg:py-24">
        <div class="container-custom text-center text-white">
            <h1 class="text-3xl lg:text-5xl font-bold mb-4">Lacak Status Pengajuan</h1>
            <p class="text-lg text-white/80 max-w-2xl mx-auto">
                Pantau progress pengajuan surat Anda secara real-time dengan memasukkan NIK dan nomor pengajuan.
            </p>
        </div>
    </section>

    <!-- Tracking Form -->
    <section class="section bg-gray-50">
        <div class="container-custom max-w-2xl">
            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                    <div class="flex items-center gap-2 text-green-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                    @if(session('tracking_code'))
                        <p class="mt-2 text-green-800">
                            Kode Tracking Anda: <strong class="font-mono text-lg">{{ session('tracking_code') }}</strong>
                        </p>
                        <p class="text-sm text-green-600 mt-1">Simpan kode ini untuk melacak status pengajuan Anda.</p>
                    @endif
                </div>
            @endif

            <!-- Error Message -->
            @if($errors->has('not_found'))
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                    <div class="flex items-center gap-2 text-red-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="font-medium">{{ $errors->first('not_found') }}</span>
                    </div>
                </div>
            @endif

            <!-- Search Card -->
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tracking.search') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="input-group">
                            <label for="nik" class="input-label">NIK (Nomor Induk Kependudukan)</label>
                            <div class="relative">
                                <input type="text" id="nik" name="nik" class="input-field input-with-icon text-lg"
                                    placeholder="Masukkan 16 digit NIK" maxlength="16"
                                    value="{{ old('nik', request('nik')) }}" required>
                                <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                </svg>
                            </div>
                            @error('nik')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="input-group">
                            <label for="nomor_pengajuan" class="input-label">Nomor Pengajuan / Tracking Code</label>
                            <div class="relative">
                                <input type="text" id="nomor_pengajuan" name="nomor_pengajuan"
                                    class="input-field input-with-icon text-lg uppercase"
                                    placeholder="Contoh: ABCD-260204-EFGH"
                                    value="{{ old('nomor_pengajuan', request('nomor_pengajuan')) }}" required>
                                <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <p class="input-helper">Masukkan kode tracking yang Anda terima saat mengajukan surat</p>
                            @error('nomor_pengajuan')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-full justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            Lacak Sekarang
                        </button>
                    </form>
                </div>
            </div>

            <!-- Result Section -->
            @if(isset($pengajuan))
                <div class="mt-8 space-y-6">
                    <!-- Status Card -->
                    <div class="card">
                        <div class="p-5 border-b border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Nomor Pengajuan</p>
                                    <p class="text-lg font-bold text-gray-900 font-mono">{{ $pengajuan->nomor_pengajuan }}</p>
                                </div>
                                @php
                                    $statusConfig = [
                                        'pending' => ['class' => 'bg-yellow-100 text-yellow-800', 'label' => 'Menunggu Verifikasi'],
                                        'verifikasi' => ['class' => 'bg-blue-100 text-blue-800', 'label' => 'Sedang Diverifikasi'],
                                        'proses' => ['class' => 'bg-indigo-100 text-indigo-800', 'label' => 'Sedang Diproses'],
                                        'ttd' => ['class' => 'bg-purple-100 text-purple-800', 'label' => 'Menunggu Tanda Tangan'],
                                        'selesai' => ['class' => 'bg-green-100 text-green-800', 'label' => 'Selesai'],
                                        'ditolak' => ['class' => 'bg-red-100 text-red-800', 'label' => 'Ditolak'],
                                    ];
                                    $status = $statusConfig[$pengajuan->status] ?? ['class' => 'bg-gray-100 text-gray-800', 'label' => ucfirst($pengajuan->status)];
                                @endphp
                                <span class="badge {{ $status['class'] }}">{{ $status['label'] }}</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Document Info -->
                            <div class="grid grid-cols-2 gap-4 mb-6 pb-6 border-b border-gray-100">
                                <div>
                                    <p class="text-sm text-gray-500">Jenis Surat</p>
                                    <p class="font-medium text-gray-900">{{ $pengajuan->jenisSurat?->nama ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Tanggal Pengajuan</p>
                                    <p class="font-medium text-gray-900">{{ $pengajuan->created_at->format('d M Y, H:i') }} WIB
                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Nama Pemohon</p>
                                    <p class="font-medium text-gray-900">{{ $pengajuan->penduduk?->nama ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Keperluan</p>
                                    <p class="font-medium text-gray-900">{{ $pengajuan->keperluan ?? '-' }}</p>
                                </div>
                            </div>

                            <!-- Status Timeline -->
                            <div class="mb-6">
                                <h4 class="font-medium text-gray-900 mb-4">Status Pengajuan</h4>
                                <ol class="relative border-l-2 border-gray-200 ml-3 space-y-6">
                                    @php
                                        $steps = ['pending', 'verifikasi', 'proses', 'ttd', 'selesai'];
                                        $currentIndex = array_search($pengajuan->status, $steps);
                                        $isRejected = $pengajuan->status === 'ditolak';
                                    @endphp

                                    <li class="ml-6">
                                        <span
                                            class="absolute flex items-center justify-center w-8 h-8 rounded-full -left-4 {{ $currentIndex >= 0 ? 'bg-green-500' : 'bg-gray-200' }}">
                                            <svg class="w-4 h-4 {{ $currentIndex >= 0 ? 'text-white' : 'text-gray-500' }}"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                        <h3 class="font-medium text-gray-900">Pengajuan Diterima</h3>
                                        <p class="text-sm text-gray-500">{{ $pengajuan->created_at->format('d M Y, H:i') }}</p>
                                    </li>

                                    <li class="ml-6">
                                        <span
                                            class="absolute flex items-center justify-center w-8 h-8 rounded-full -left-4 {{ $currentIndex >= 1 ? 'bg-green-500' : ($currentIndex === 0 ? 'bg-blue-500 animate-pulse' : 'bg-gray-200') }}">
                                            @if($currentIndex >= 1)
                                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @else
                                                <span class="w-2 h-2 bg-white rounded-full"></span>
                                            @endif
                                        </span>
                                        <h3 class="font-medium {{ $currentIndex >= 1 ? 'text-gray-900' : 'text-gray-500' }}">
                                            Verifikasi Data</h3>
                                        <p class="text-sm text-gray-500">Petugas memverifikasi kelengkapan data</p>
                                    </li>

                                    <li class="ml-6">
                                        <span
                                            class="absolute flex items-center justify-center w-8 h-8 rounded-full -left-4 {{ $currentIndex >= 2 ? 'bg-green-500' : ($currentIndex === 1 ? 'bg-blue-500 animate-pulse' : 'bg-gray-200') }}">
                                            @if($currentIndex >= 2)
                                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @else
                                                <span class="w-2 h-2 bg-white rounded-full"></span>
                                            @endif
                                        </span>
                                        <h3 class="font-medium {{ $currentIndex >= 2 ? 'text-gray-900' : 'text-gray-500' }}">
                                            Proses Pembuatan Surat</h3>
                                        <p class="text-sm text-gray-500">Surat sedang dibuat oleh petugas</p>
                                    </li>

                                    <li class="ml-6">
                                        <span
                                            class="absolute flex items-center justify-center w-8 h-8 rounded-full -left-4 {{ $currentIndex >= 3 ? 'bg-green-500' : ($currentIndex === 2 ? 'bg-blue-500 animate-pulse' : 'bg-gray-200') }}">
                                            @if($currentIndex >= 3)
                                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @else
                                                <span class="w-2 h-2 bg-white rounded-full"></span>
                                            @endif
                                        </span>
                                        <h3 class="font-medium {{ $currentIndex >= 3 ? 'text-gray-900' : 'text-gray-500' }}">
                                            Tanda Tangan Kepala Desa</h3>
                                        <p class="text-sm text-gray-500">Menunggu tanda tangan Kepala Desa</p>
                                    </li>

                                    <li class="ml-6">
                                        <span
                                            class="absolute flex items-center justify-center w-8 h-8 rounded-full -left-4 {{ $pengajuan->status === 'selesai' ? 'bg-green-500' : ($currentIndex === 3 ? 'bg-blue-500 animate-pulse' : 'bg-gray-200') }}">
                                            @if($pengajuan->status === 'selesai')
                                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @else
                                                <span class="w-2 h-2 bg-white rounded-full"></span>
                                            @endif
                                        </span>
                                        <h3
                                            class="font-medium {{ $pengajuan->status === 'selesai' ? 'text-gray-900' : 'text-gray-500' }}">
                                            Surat Siap Diambil</h3>
                                        <p class="text-sm text-gray-500">Ambil surat di kantor desa</p>
                                    </li>
                                </ol>
                            </div>

                            @if($isRejected && $pengajuan->alasan_tolak)
                                <div class="p-4 bg-red-50 border border-red-200 rounded-lg mb-6">
                                    <p class="text-sm font-medium text-red-800">Alasan Penolakan:</p>
                                    <p class="text-red-700">{{ $pengajuan->alasan_tolak }}</p>
                                </div>
                            @endif

                            @if($pengajuan->status === 'selesai')
                                <div class="p-4 bg-green-50 border border-green-200 rounded-lg">
                                    <p class="text-sm font-medium text-green-800 mb-2">🎉 Surat Anda sudah selesai!</p>
                                    <p class="text-green-700 text-sm mb-3">Silakan ambil di kantor desa dengan membawa KTP.</p>
                                    @if($pengajuan->nomor_surat)
                                        <p class="text-green-800 font-medium">Nomor Surat: {{ $pengajuan->nomor_surat }}</p>
                                    @endif
                                    @if($pengajuan->file_hasil)
                                        <a href="{{ Storage::url($pengajuan->file_hasil) }}" target="_blank"
                                            class="btn btn-primary btn-sm mt-3">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            Download Surat
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Uploaded Documents -->
                    @if($pengajuan->dokumen_pendukung && count($pengajuan->dokumen_pendukung) > 0)
                        <div class="card">
                            <div class="card-body">
                                <h4 class="font-medium text-gray-900 mb-4">Dokumen yang Diupload</h4>
                                <ul class="space-y-2">
                                    @foreach($pengajuan->dokumen_pendukung as $doc)
                                        <li class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <span class="text-sm text-gray-700">{{ $doc['name'] ?? 'Dokumen' }}</span>
                                            <span class="text-xs text-gray-400">({{ number_format(($doc['size'] ?? 0) / 1024, 1) }}
                                                KB)</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <!-- Additional Data -->
                    @if($pengajuan->data_tambahan && count($pengajuan->data_tambahan) > 0)
                        <div class="card">
                            <div class="card-body">
                                <h4 class="font-medium text-gray-900 mb-4">Data Tambahan</h4>
                                <dl class="grid grid-cols-2 gap-4">
                                    @foreach($pengajuan->data_tambahan as $key => $value)
                                        @if($value)
                                            <div>
                                                <dt class="text-sm text-gray-500">{{ ucwords(str_replace('_', ' ', $key)) }}</dt>
                                                <dd class="font-medium text-gray-900">{{ $value }}</dd>
                                            </div>
                                        @endif
                                    @endforeach
                                </dl>
                            </div>
                        </div>
                    @endif
                </div>
            @endif

            <!-- Help Section -->
            <div class="mt-8 text-center">
                <p class="text-gray-600 mb-4">
                    Butuh bantuan? Hubungi kami untuk informasi lebih lanjut.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('services') }}" class="btn btn-secondary">
                        Ajukan Surat Baru
                    </a>
                    <a href="https://wa.me/6281234567890" class="btn btn-outline" target="_blank">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z" />
                        </svg>
                        Hubungi via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection