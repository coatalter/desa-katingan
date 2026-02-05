@extends('layouts.warga')

@section('title', 'Buat Pengajuan - ' . $namaJenis)
@section('page-title', 'Buat Pengajuan Surat')
@section('page-subtitle', $namaJenis)

@section('content')
    <div class="max-w-3xl">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm mb-6">
            <a href="{{ route('warga.dashboard') }}" class="text-gray-500 hover:text-primary-600">Dashboard</a>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <a href="{{ route('warga.requests') }}" class="text-gray-500 hover:text-primary-600">Pengajuan Surat</a>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            <span class="text-gray-900 font-medium">Buat Pengajuan</span>
        </nav>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-primary-50 to-white">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 bg-primary-100 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">{{ $namaJenis }}</h2>
                        <p class="text-sm text-gray-500">Isi formulir dengan data yang benar dan lengkap</p>
                    </div>
                </div>
            </div>

            <form action="{{ route('warga.requests.store') }}" method="POST" enctype="multipart/form-data"
                class="p-6 space-y-6">
                @csrf
                <input type="hidden" name="jenis_surat" value="{{ $jenis }}">

                <!-- Info Box -->
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                    <div class="flex gap-3">
                        <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-sm text-blue-800">
                            <p class="font-medium mb-1">Informasi Penting</p>
                            <ul class="list-disc list-inside space-y-1 text-blue-700">
                                <li>Data diri akan diambil dari profil Anda yang terdaftar</li>
                                <li>Pastikan data profil sudah benar dan lengkap</li>
                                <li>Proses pengajuan membutuhkan 1-2 hari kerja</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Data Pemohon (Auto-filled) -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                        <span
                            class="w-6 h-6 bg-primary-100 rounded-full flex items-center justify-center text-sm text-primary-700 font-bold">1</span>
                        Data Pemohon
                    </h3>

                    <div class="grid md:grid-cols-2 gap-4 p-4 bg-gray-50 rounded-xl">
                        <div>
                            <p class="text-sm text-gray-500">NIK</p>
                            <p class="font-medium text-gray-900">3201XXXXXXXXXXXX</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Nama Lengkap</p>
                            <p class="font-medium text-gray-900">Budi Santoso</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Tempat, Tanggal Lahir</p>
                            <p class="font-medium text-gray-900">Katingan, 15 Januari 1990</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Pekerjaan</p>
                            <p class="font-medium text-gray-900">Wiraswasta</p>
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-sm text-gray-500">Alamat</p>
                            <p class="font-medium text-gray-900">Jl. Desa Katingan RT 02/RW 01, Kec. Katingan</p>
                        </div>
                    </div>
                </div>

                <!-- Keperluan -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                        <span
                            class="w-6 h-6 bg-primary-100 rounded-full flex items-center justify-center text-sm text-primary-700 font-bold">2</span>
                        Keperluan Surat
                    </h3>

                    <div class="input-group">
                        <label for="keperluan" class="input-label">Keperluan / Tujuan Penggunaan Surat <span
                                class="text-red-500">*</span></label>
                        <textarea id="keperluan" name="keperluan" rows="3"
                            class="input-field @error('keperluan') input-error @enderror"
                            placeholder="Contoh: Untuk keperluan melamar pekerjaan di PT. ABC"
                            required>{{ old('keperluan') }}</textarea>
                        @error('keperluan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Upload Dokumen -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                        <span
                            class="w-6 h-6 bg-primary-100 rounded-full flex items-center justify-center text-sm text-primary-700 font-bold">3</span>
                        Dokumen Pendukung
                        <span class="text-sm font-normal text-gray-500">(Opsional)</span>
                    </h3>

                    <div
                        class="border-2 border-dashed border-gray-200 rounded-xl p-8 text-center hover:border-primary-300 transition-colors">
                        <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                        </div>
                        <p class="text-gray-600 mb-2">Drag & drop file atau</p>
                        <label class="btn btn-outline btn-sm cursor-pointer">
                            <input type="file" name="dokumen[]" multiple class="hidden" accept=".jpg,.jpeg,.png,.pdf">
                            Pilih File
                        </label>
                        <p class="text-xs text-gray-400 mt-3">Format: JPG, PNG, PDF. Maks. 2MB per file</p>
                    </div>
                </div>

                <!-- Submit -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                    <a href="{{ route('warga.requests') }}" class="btn btn-ghost">
                        ← Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                        Kirim Pengajuan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection