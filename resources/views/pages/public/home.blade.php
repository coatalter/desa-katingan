@extends('layouts.public')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section -->
    <section class="hero gradient-hero relative">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="hero-pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                        <circle cx="20" cy="20" r="1" fill="white" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#hero-pattern)" />
            </svg>
        </div>

        <!-- Floating Elements -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-secondary-500/20 rounded-full blur-3xl"></div>

        <div class="hero-content">
            <div
                class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-white/90 text-sm mb-6">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                Layanan Online Tersedia 24/7
            </div>

            <h1 class="hero-title">
                <span class="text-white/80">Selamat Datang di</span><br>
                <span class="text-white">Desa Katingan</span>
            </h1>

            <p class="hero-subtitle">
                Melayani dengan Hati, Membangun dengan Teknologi.<br>
                Akses layanan administrasi desa dengan mudah, cepat, dan transparan.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('services') }}" class="btn btn-lg bg-white text-primary-700 hover:bg-gray-100 shadow-xl">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Ajukan Surat Sekarang
                </a>
                <a href="{{ route('tracking') }}"
                    class="btn btn-lg bg-white/20 text-white border-2 border-white/30 hover:bg-white/30">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Lacak Pengajuan
                </a>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
            </svg>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="section bg-white relative overflow-hidden">
        <!-- Background Decoration -->
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-primary-100 rounded-full blur-3xl opacity-50"></div>

        <div class="container-custom relative">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Stat 1 -->
                <div class="stat-card group">
                    <div
                        class="stat-icon bg-primary-100 text-primary-600 group-hover:bg-primary-600 group-hover:text-white transition-colors">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div class="stat-value" data-count="5432">5,432</div>
                    <div class="stat-label">Total Penduduk</div>
                </div>

                <!-- Stat 2 -->
                <div class="stat-card group">
                    <div
                        class="stat-icon bg-secondary-100 text-secondary-600 group-hover:bg-secondary-600 group-hover:text-white transition-colors">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div class="stat-value" data-count="1247">1,247</div>
                    <div class="stat-label">Surat Tahun Ini</div>
                </div>

                <!-- Stat 3 -->
                <div class="stat-card group">
                    <div
                        class="stat-icon bg-accent-100 text-accent-600 group-hover:bg-accent-600 group-hover:text-white transition-colors">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div class="stat-value" data-count="45">45</div>
                    <div class="stat-label">UMKM Aktif</div>
                </div>

                <!-- Stat 4 -->
                <div class="stat-card group">
                    <div
                        class="stat-icon bg-green-100 text-green-600 group-hover:bg-green-600 group-hover:text-white transition-colors">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div class="stat-value" data-count="12">12</div>
                    <div class="stat-label">Destinasi Wisata</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Services Section -->
    <section class="section bg-gray-50">
        <div class="container-custom">
            <div class="section-header">
                <h2 class="section-title">Layanan Populer</h2>
                <p class="section-subtitle">
                    Ajukan berbagai jenis surat dengan mudah dan cepat. Proses transparan dengan tracking real-time.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Service Card 1 -->
                <a href="{{ route('services') }}" class="card group cursor-pointer">
                    <div class="card-body text-center">
                        <div
                            class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center text-white shadow-lg group-hover:shadow-xl group-hover:scale-110 transition-all">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2">Surat Domisili</h3>
                        <p class="text-sm text-gray-500">Surat keterangan tempat tinggal untuk berbagai keperluan</p>
                        <div
                            class="mt-4 text-primary-600 text-sm font-medium group-hover:translate-x-1 transition-transform inline-flex items-center gap-1">
                            Ajukan Sekarang
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Service Card 2 -->
                <a href="{{ route('services') }}" class="card group cursor-pointer">
                    <div class="card-body text-center">
                        <div
                            class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-secondary-500 to-secondary-600 rounded-2xl flex items-center justify-center text-white shadow-lg group-hover:shadow-xl group-hover:scale-110 transition-all">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2">Surat Keterangan Usaha</h3>
                        <p class="text-sm text-gray-500">Legalitas usaha untuk UMKM dan pelaku bisnis</p>
                        <div
                            class="mt-4 text-primary-600 text-sm font-medium group-hover:translate-x-1 transition-transform inline-flex items-center gap-1">
                            Ajukan Sekarang
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Service Card 3 -->
                <a href="{{ route('services') }}" class="card group cursor-pointer">
                    <div class="card-body text-center">
                        <div
                            class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-accent-500 to-accent-600 rounded-2xl flex items-center justify-center text-white shadow-lg group-hover:shadow-xl group-hover:scale-110 transition-all">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2">Surat Pengantar SKCK</h3>
                        <p class="text-sm text-gray-500">Pengantar untuk mengurus SKCK di kepolisian</p>
                        <div
                            class="mt-4 text-primary-600 text-sm font-medium group-hover:translate-x-1 transition-transform inline-flex items-center gap-1">
                            Ajukan Sekarang
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Service Card 4 -->
                <a href="{{ route('services') }}" class="card group cursor-pointer">
                    <div class="card-body text-center">
                        <div
                            class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center text-white shadow-lg group-hover:shadow-xl group-hover:scale-110 transition-all">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2">Lihat Semua Layanan</h3>
                        <p class="text-sm text-gray-500">Jelajahi semua jenis surat yang tersedia</p>
                        <div
                            class="mt-4 text-primary-600 text-sm font-medium group-hover:translate-x-1 transition-transform inline-flex items-center gap-1">
                            Lihat Semua
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="section bg-white">
        <div class="container-custom">
            <div class="section-header">
                <h2 class="section-title">Cara Mengajukan Surat</h2>
                <p class="section-subtitle">
                    Proses mudah dan cepat, cukup 4 langkah untuk mendapatkan surat yang Anda butuhkan
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="text-center relative">
                    <div
                        class="w-20 h-20 mx-auto mb-6 bg-primary-100 rounded-2xl flex items-center justify-center relative">
                        <span class="text-3xl font-bold text-primary-600">1</span>
                        <!-- Connector line (hidden on mobile) -->
                        <div class="hidden lg:block absolute top-1/2 -right-full w-full h-0.5 bg-primary-200"></div>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Login dengan NIK</h3>
                    <p class="text-sm text-gray-500">Masuk menggunakan NIK dan PIN Anda untuk mengakses layanan</p>
                </div>

                <!-- Step 2 -->
                <div class="text-center relative">
                    <div
                        class="w-20 h-20 mx-auto mb-6 bg-secondary-100 rounded-2xl flex items-center justify-center relative">
                        <span class="text-3xl font-bold text-secondary-600">2</span>
                        <div class="hidden lg:block absolute top-1/2 -right-full w-full h-0.5 bg-secondary-200"></div>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Pilih Jenis Surat</h3>
                    <p class="text-sm text-gray-500">Pilih surat yang dibutuhkan, data diri terisi otomatis</p>
                </div>

                <!-- Step 3 -->
                <div class="text-center relative">
                    <div class="w-20 h-20 mx-auto mb-6 bg-accent-100 rounded-2xl flex items-center justify-center relative">
                        <span class="text-3xl font-bold text-accent-600">3</span>
                        <div class="hidden lg:block absolute top-1/2 -right-full w-full h-0.5 bg-accent-200"></div>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Upload Dokumen</h3>
                    <p class="text-sm text-gray-500">Lengkapi persyaratan dengan upload dokumen pendukung</p>
                </div>

                <!-- Step 4 -->
                <div class="text-center">
                    <div class="w-20 h-20 mx-auto mb-6 bg-green-100 rounded-2xl flex items-center justify-center">
                        <span class="text-3xl font-bold text-green-600">4</span>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Terima Surat</h3>
                    <p class="text-sm text-gray-500">Download surat digital dengan QR Code validasi</p>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('services') }}" class="btn btn-primary btn-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    Mulai Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- Latest News Section -->
    <section class="section bg-gray-50">
        <div class="container-custom">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-4">
                <div>
                    <h2 class="section-title text-left mb-2">Berita Terbaru</h2>
                    <p class="text-gray-600">Informasi dan kegiatan terkini dari Desa Katingan</p>
                </div>
                <a href="{{ route('news') }}" class="btn btn-secondary">
                    Lihat Semua Berita
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- News Card 1 -->
                <article class="card group cursor-pointer overflow-hidden">
                    <div class="aspect-video bg-gradient-to-br from-primary-400 to-primary-600 relative overflow-hidden">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="badge bg-white/90 text-primary-700">Kegiatan</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            2 Februari 2026
                        </div>
                        <h3
                            class="font-semibold text-gray-900 mb-2 group-hover:text-primary-600 transition-colors line-clamp-2">
                            Musyawarah Desa: Rencana Pembangunan Tahun 2026
                        </h3>
                        <p class="text-sm text-gray-500 line-clamp-3">
                            Kepala Desa bersama perangkat desa dan tokoh masyarakat mengadakan musyawarah untuk membahas
                            prioritas pembangunan...
                        </p>
                    </div>
                </article>

                <!-- News Card 2 -->
                <article class="card group cursor-pointer overflow-hidden">
                    <div
                        class="aspect-video bg-gradient-to-br from-secondary-400 to-secondary-600 relative overflow-hidden">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="badge bg-white/90 text-secondary-700">Pengumuman</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            30 Januari 2026
                        </div>
                        <h3
                            class="font-semibold text-gray-900 mb-2 group-hover:text-primary-600 transition-colors line-clamp-2">
                            Jadwal Pelayanan Administrasi Bulan Februari
                        </h3>
                        <p class="text-sm text-gray-500 line-clamp-3">
                            Informasi jadwal pelayanan administrasi desa untuk bulan Februari 2026. Pelayanan tetap buka
                            setiap hari kerja...
                        </p>
                    </div>
                </article>

                <!-- News Card 3 -->
                <article class="card group cursor-pointer overflow-hidden">
                    <div class="aspect-video bg-gradient-to-br from-accent-400 to-accent-600 relative overflow-hidden">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="badge bg-white/90 text-accent-700">Pembangunan</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            25 Januari 2026
                        </div>
                        <h3
                            class="font-semibold text-gray-900 mb-2 group-hover:text-primary-600 transition-colors line-clamp-2">
                            Peresmian Jembatan Penghubung Dusun Baru
                        </h3>
                        <p class="text-sm text-gray-500 line-clamp-3">
                            Jembatan penghubung antar dusun yang dibangun menggunakan dana desa resmi beroperasi dan
                            memudahkan akses warga...
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section
        class="section bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 text-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="cta-pattern" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                        <circle cx="30" cy="30" r="2" fill="white" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#cta-pattern)" />
            </svg>
        </div>

        <div class="container-custom relative text-center">
            <h2 class="text-3xl lg:text-4xl font-bold mb-6">
                Butuh Bantuan atau Informasi?
            </h2>
            <p class="text-lg text-white/80 mb-8 max-w-2xl mx-auto">
                Tim kami siap membantu Anda. Hubungi kami melalui WhatsApp atau kunjungi kantor desa untuk pelayanan
                langsung.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="https://wa.me/6281234567890" target="_blank"
                    class="btn btn-lg bg-green-500 hover:bg-green-600 text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                    </svg>
                    Hubungi via WhatsApp
                </a>
                <a href="{{ route('profile.structure') }}"
                    class="btn btn-lg bg-white/20 border-2 border-white/30 hover:bg-white/30 text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Lihat Lokasi Kantor
                </a>
            </div>
        </div>
    </section>
@endsection