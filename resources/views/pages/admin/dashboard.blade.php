@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Welcome Banner -->
    <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-2xl p-6 mb-8 text-white">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold mb-1">Selamat Datang, {{ auth()->user()->name }}!</h1>
                <p class="text-primary-100">Panel Admin Desa Katingan - {{ now()->format('l, d F Y') }}</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('admin.surat.index') }}"
                    class="inline-flex items-center gap-2 bg-white/20 hover:bg-white/30 backdrop-blur px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Proses Pengajuan Surat
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Overview -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Penduduk -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Total Penduduk</p>
                    <p class="text-3xl font-bold text-gray-900">{{ number_format($stats['total_penduduk']) }}</p>
                    <p class="text-xs text-gray-400 mt-1">
                        <span class="text-blue-600">{{ $stats['penduduk_laki'] }} L</span> /
                        <span class="text-pink-600">{{ $stats['penduduk_perempuan'] }} P</span>
                    </p>
                </div>
                <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Kepala Keluarga -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Kartu Keluarga</p>
                    <p class="text-3xl font-bold text-gray-900">{{ number_format($stats['total_kk']) }}</p>
                    <p class="text-xs text-gray-400 mt-1">Kepala Keluarga</p>
                </div>
                <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Surat Pending -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Surat Pending</p>
                    <p class="text-3xl font-bold text-yellow-600">{{ $stats['surat_pending'] }}</p>
                    <p class="text-xs text-gray-400 mt-1">Menunggu diproses</p>
                </div>
                <div class="w-14 h-14 bg-yellow-100 rounded-2xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Surat Bulan Ini -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Surat Bulan Ini</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['surat_bulan_ini'] }}</p>
                    <p class="text-xs text-green-600 mt-1">
                        <span class="inline-flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M12 7a1 1 0 01-1-1V5.414l-4.293 4.293a1 1 0 11-1.414-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L13 5.414V6a1 1 0 01-1 1z" />
                            </svg>
                            vs bulan lalu
                        </span>
                    </p>
                </div>
                <div class="w-14 h-14 bg-primary-100 rounded-2xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Visualizations -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Gender Chart -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Distribusi Gender</h3>
            <div class="relative h-64">
                <canvas id="genderChart"></canvas>
            </div>
        </div>

        <!-- Age Groups Chart -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Kelompok Usia</h3>
            <div class="relative h-64">
                <canvas id="ageChart"></canvas>
            </div>
        </div>

        <!-- Education Chart -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Tingkat Pendidikan</h3>
            <div class="relative h-64">
                <canvas id="educationChart"></canvas>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-3 gap-6">
        <!-- Pengajuan Terbaru -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-900">Pengajuan Terbaru</h2>
                <a href="{{ route('admin.surat.index') }}"
                    class="text-sm text-primary-600 hover:text-primary-700 font-medium">
                    Lihat Semua →
                </a>
            </div>
            <div class="divide-y divide-gray-100">
                @forelse($recentSurat as $surat)
                    <div class="p-4 hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0
                                                    @if($surat->status === 'pending') bg-yellow-100 text-yellow-600
                                                    @elseif($surat->status === 'selesai') bg-green-100 text-green-600
                                                    @elseif($surat->status === 'ditolak') bg-red-100 text-red-600
                                                    @else bg-blue-100 text-blue-600 @endif">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2">
                                    <p class="font-medium text-gray-900 truncate">
                                        {{ $surat->jenisSurat?->nama ?? 'Jenis Surat' }}</p>
                                    <span class="badge 
                                                            @if($surat->status === 'pending') badge-warning
                                                            @elseif($surat->status === 'selesai') badge-success
                                                            @elseif($surat->status === 'ditolak') bg-red-100 text-red-100 text-red-700
                                                            @else badge-process @endif">
                                        {{ $surat->status_label }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-500">{{ $surat->penduduk?->nama ?? '-' }} •
                                    {{ $surat->nomor_pengajuan }}
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-gray-400">{{ $surat->created_at->diffForHumans() }}</p>
                                <a href="{{ route('admin.surat.show', $surat) }}"
                                    class="text-xs text-primary-600 hover:underline">Detail</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center text-gray-500">
                        <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <p>Belum ada pengajuan surat</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Aksi Cepat</h3>
                <div class="grid grid-cols-2 gap-3">
                    <a href="{{ route('admin.penduduk.create') }}"
                        class="flex flex-col items-center gap-2 p-4 bg-gray-50 rounded-xl hover:bg-primary-50 transition-colors group">
                        <div
                            class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center group-hover:bg-primary-200 transition-colors">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-gray-700 text-center">Tambah Penduduk</span>
                    </a>
                    <a href="{{ route('admin.berita.create') }}"
                        class="flex flex-col items-center gap-2 p-4 bg-gray-50 rounded-xl hover:bg-primary-50 transition-colors group">
                        <div
                            class="w-10 h-10 bg-secondary-100 rounded-lg flex items-center justify-center group-hover:bg-secondary-200 transition-colors">
                            <svg class="w-5 h-5 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-gray-700 text-center">Buat Berita</span>
                    </a>
                    <a href="{{ route('admin.potensi.create') }}"
                        class="flex flex-col items-center gap-2 p-4 bg-gray-50 rounded-xl hover:bg-primary-50 transition-colors group">
                        <div
                            class="w-10 h-10 bg-accent-100 rounded-lg flex items-center justify-center group-hover:bg-accent-200 transition-colors">
                            <svg class="w-5 h-5 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-gray-700 text-center">Tambah Potensi</span>
                    </a>
                    <a href="{{ route('admin.surat.index') }}"
                        class="flex flex-col items-center gap-2 p-4 bg-gray-50 rounded-xl hover:bg-primary-50 transition-colors group">
                        <div
                            class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center group-hover:bg-purple-200 transition-colors">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-gray-700 text-center">Kelola Surat</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        };

        // Gender Chart
        new Chart(document.getElementById('genderChart'), {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($demographics['gender']['labels']) !!},
                datasets: [{
                    data: {!! json_encode($demographics['gender']['data']) !!},
                    backgroundColor: ['#3b82f6', '#ec4899'],
                    borderWidth: 0
                }]
            },
            options: chartOptions
        });

        // Age Chart
        new Chart(document.getElementById('ageChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($demographics['age_groups']['labels']) !!},
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: {!! json_encode($demographics['age_groups']['data']) !!},
                    backgroundColor: '#10b981',
                    borderRadius: 8
                }]
            },
            options: {
                ...chartOptions,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Education Chart
        new Chart(document.getElementById('educationChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($demographics['education']['labels']) !!},
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: {!! json_encode($demographics['education']['data']) !!},
                    backgroundColor: '#8b5cf6',
                    borderRadius: 8
                }]
            },
            options: {
                ...chartOptions,
                indexAxis: 'y',
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
@endpush