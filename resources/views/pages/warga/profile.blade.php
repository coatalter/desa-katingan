@extends('layouts.warga')

@section('title', 'Profil Saya')
@section('page-title', 'Profil Saya')
@section('page-subtitle', 'Kelola informasi akun Anda')

@section('content')
    <div class="grid lg:grid-cols-3 gap-6">
        <!-- Profile Card -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-br from-primary-500 to-primary-600 h-24"></div>
                <div class="p-6 -mt-12">
                    <div class="w-24 h-24 bg-white rounded-2xl shadow-lg flex items-center justify-center mx-auto mb-4">
                        <span class="text-3xl font-bold text-primary-600">BS</span>
                    </div>
                    <div class="text-center">
                        <h3 class="text-xl font-bold text-gray-900">Budi Santoso</h3>
                        <p class="text-sm text-gray-500">Warga Desa Katingan</p>
                        <span class="badge badge-success mt-2">
                            <span class="status-dot status-dot-success"></span>
                            Terverifikasi
                        </span>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-100">
                        <div class="space-y-4">
                            <div class="flex items-center gap-3 text-sm">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1" />
                                </svg>
                                <span class="text-gray-600">3201XXXXXXXXXXXX</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span class="text-gray-600">081234567890</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="text-gray-600">Bergabung Jan 2026</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900">Edit Profil</h3>
                    <p class="text-sm text-gray-500">Perbarui informasi kontak Anda</p>
                </div>

                @if(session('success'))
                    <div class="mx-6 mt-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                        <div class="flex items-center gap-2 text-green-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                <form action="{{ route('warga.profile.update') }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Data KTP (Read-only) -->
                    <div class="p-4 bg-gray-50 rounded-xl">
                        <p class="text-sm font-medium text-gray-700 mb-3">Data KTP (Tidak dapat diubah)</p>
                        <div class="grid md:grid-cols-2 gap-4 text-sm">
                            <div>
                                <span class="text-gray-500">NIK:</span>
                                <span class="font-medium text-gray-900 ml-2">3201XXXXXXXXXXXX</span>
                            </div>
                            <div>
                                <span class="text-gray-500">Nama:</span>
                                <span class="font-medium text-gray-900 ml-2">Budi Santoso</span>
                            </div>
                            <div>
                                <span class="text-gray-500">TTL:</span>
                                <span class="font-medium text-gray-900 ml-2">Katingan, 15-01-1990</span>
                            </div>
                            <div>
                                <span class="text-gray-500">Jenis Kelamin:</span>
                                <span class="font-medium text-gray-900 ml-2">Laki-laki</span>
                            </div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="input-group">
                            <label for="no_hp" class="input-label">Nomor WhatsApp</label>
                            <input type="tel" id="no_hp" name="no_hp" value="081234567890" class="input-field">
                        </div>
                        <div class="input-group">
                            <label for="email" class="input-label">Email</label>
                            <input type="email" id="email" name="email" value="budi@email.com" class="input-field">
                        </div>
                    </div>

                    <div class="input-group">
                        <label for="alamat" class="input-label">Alamat Lengkap</label>
                        <textarea id="alamat" name="alamat" rows="3"
                            class="input-field">Jl. Desa Katingan RT 02/RW 01, Kec. Katingan, Kab. Katingan, Kalimantan Tengah</textarea>
                    </div>

                    <div class="flex justify-end pt-4 border-t border-gray-100">
                        <button type="submit" class="btn btn-primary">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

            <!-- Change Password -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 mt-6">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900">Ubah Password</h3>
                </div>
                <form class="p-6 space-y-6">
                    <div class="input-group">
                        <label for="current_password" class="input-label">Password Saat Ini</label>
                        <input type="password" id="current_password" name="current_password" class="input-field">
                    </div>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="input-group">
                            <label for="new_password" class="input-label">Password Baru</label>
                            <input type="password" id="new_password" name="new_password" class="input-field">
                        </div>
                        <div class="input-group">
                            <label for="new_password_confirmation" class="input-label">Konfirmasi Password Baru</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                class="input-field">
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-secondary">Ubah Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection