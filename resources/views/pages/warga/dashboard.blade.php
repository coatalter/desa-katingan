@extends('layouts.warga')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Selamat datang kembali, Budi Santoso')

@section('content')
    <!-- Stats Overview -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Pending Requests -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="badge badge-warning">Pending</span>
            </div>
            <p class="text-3xl font-bold text-gray-900">2</p>
            <p class="text-sm text-gray-500">Menunggu Proses</p>
        </div>

        <!-- Processing -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </div>
                <span class="badge badge-process">Diproses</span>
            </div>
            <p class="text-3xl font-bold text-gray-900">1</p>
            <p class="text-sm text-gray-500">Sedang Diproses</p>
        </div>

        <!-- Completed -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="badge badge-success">Selesai</span>
            </div>
            <p class="text-3xl font-bold text-gray-900">5</p>
            <p class="text-sm text-gray-500">Surat Selesai</p>
        </div>

        <!-- Total -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-gray-900">8</p>
            <p class="text-sm text-gray-500">Total Pengajuan</p>
        </div>
    </div>

    <div class="grid lg:grid-cols-3 gap-6">
        <!-- Recent Requests -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Pengajuan Terbaru</h3>
                    <a href="{{ route('warga.requests') }}"
                        class="text-sm text-primary-600 hover:text-primary-700 font-medium">
                        Lihat Semua →
                    </a>
                </div>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <!-- Request Item 1 -->
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                        <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-gray-900">Surat Keterangan Domisili</p>
                            <p class="text-sm text-gray-500">REQ-2026-00145 • 1 Feb 2026</p>
                        </div>
                        <span class="badge badge-warning">Pending</span>
                    </div>

                    <!-- Request Item 2 -->
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-gray-900">Surat Pengantar SKCK</p>
                            <p class="text-sm text-gray-500">REQ-2026-00142 • 28 Jan 2026</p>
                        </div>
                        <span class="badge badge-process">Diproses</span>
                    </div>

                    <!-- Request Item 3 -->
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-gray-900">Surat Keterangan Usaha</p>
                            <p class="text-sm text-gray-500">REQ-2026-00138 • 25 Jan 2026</p>
                        </div>
                        <span class="badge badge-success">Selesai</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900">Buat Pengajuan</h3>
            </div>
            <div class="p-6 space-y-3">
                <a href="{{ route('warga.requests.create', 'domisili') }}"
                    class="flex items-center gap-3 p-4 bg-gray-50 rounded-xl hover:bg-primary-50 transition-colors group">
                    <div
                        class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center group-hover:bg-primary-200 transition-colors">
                        <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">Surat Domisili</p>
                        <p class="text-xs text-gray-500">Keterangan tempat tinggal</p>
                    </div>
                </a>

                <a href="{{ route('warga.requests.create', 'usaha') }}"
                    class="flex items-center gap-3 p-4 bg-gray-50 rounded-xl hover:bg-primary-50 transition-colors group">
                    <div
                        class="w-10 h-10 bg-secondary-100 rounded-lg flex items-center justify-center group-hover:bg-secondary-200 transition-colors">
                        <svg class="w-5 h-5 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">Surat Usaha</p>
                        <p class="text-xs text-gray-500">Keterangan usaha UMKM</p>
                    </div>
                </a>

                <a href="{{ route('warga.requests.create', 'skck') }}"
                    class="flex items-center gap-3 p-4 bg-gray-50 rounded-xl hover:bg-primary-50 transition-colors group">
                    <div
                        class="w-10 h-10 bg-accent-100 rounded-lg flex items-center justify-center group-hover:bg-accent-200 transition-colors">
                        <svg class="w-5 h-5 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">Pengantar SKCK</p>
                        <p class="text-xs text-gray-500">Surat pengantar kepolisian</p>
                    </div>
                </a>

                <a href="{{ route('services') }}" class="btn btn-outline w-full justify-center mt-4">
                    Lihat Semua Layanan
                </a>
            </div>
        </div>
    </div>
@endsection