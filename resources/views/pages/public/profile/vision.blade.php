@extends('layouts.public')

@section('title', 'Visi & Misi')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-primary-600 to-primary-800 py-16 lg:py-24">
        <div class="container-custom text-center text-white">
            <nav class="text-sm mb-4">
                <a href="{{ route('home') }}" class="text-white/70 hover:text-white">Beranda</a>
                <span class="mx-2 text-white/50">/</span>
                <span>Visi & Misi</span>
            </nav>
            <h1 class="text-3xl lg:text-5xl font-bold mb-4">Visi & Misi</h1>
            <p class="text-lg text-white/80 max-w-2xl mx-auto">
                Arah dan tujuan pembangunan Desa Katingan untuk mewujudkan kesejahteraan masyarakat
            </p>
        </div>
    </section>

    <!-- Visi Section -->
    <section class="section bg-white">
        <div class="container-custom">
            <div class="max-w-4xl mx-auto text-center">
                <div
                    class="inline-flex items-center gap-2 bg-primary-100 text-primary-700 px-4 py-2 rounded-full text-sm font-medium mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    VISI
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-8">
                    "Mewujudkan Desa Katingan yang Maju, Mandiri, dan Sejahtera Berbasis Teknologi dan Kearifan Lokal"
                </h2>
            </div>
        </div>
    </section>

    <!-- Misi Section -->
    <section class="section bg-gray-50">
        <div class="container-custom">
            <div class="text-center mb-12">
                <div
                    class="inline-flex items-center gap-2 bg-secondary-100 text-secondary-700 px-4 py-2 rounded-full text-sm font-medium mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                    MISI
                </div>
                <h2 class="section-title">Langkah Strategis Mencapai Visi</h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
                <!-- Misi 1 -->
                <div class="card">
                    <div class="card-body">
                        <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mb-4">
                            <span class="text-xl font-bold text-primary-600">1</span>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2">Pelayanan Prima</h3>
                        <p class="text-sm text-gray-600">
                            Meningkatkan kualitas pelayanan publik yang cepat, transparan, dan berbasis teknologi digital.
                        </p>
                    </div>
                </div>

                <!-- Misi 2 -->
                <div class="card">
                    <div class="card-body">
                        <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mb-4">
                            <span class="text-xl font-bold text-primary-600">2</span>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2">Pembangunan Infrastruktur</h3>
                        <p class="text-sm text-gray-600">
                            Membangun dan memelihara infrastruktur desa yang berkualitas untuk mendukung aktivitas ekonomi.
                        </p>
                    </div>
                </div>

                <!-- Misi 3 -->
                <div class="card">
                    <div class="card-body">
                        <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mb-4">
                            <span class="text-xl font-bold text-primary-600">3</span>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2">Pemberdayaan Ekonomi</h3>
                        <p class="text-sm text-gray-600">
                            Mengembangkan potensi ekonomi lokal melalui pembinaan UMKM dan pengembangan wisata desa.
                        </p>
                    </div>
                </div>

                <!-- Misi 4 -->
                <div class="card">
                    <div class="card-body">
                        <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mb-4">
                            <span class="text-xl font-bold text-primary-600">4</span>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2">Pendidikan Berkualitas</h3>
                        <p class="text-sm text-gray-600">
                            Meningkatkan akses dan kualitas pendidikan bagi seluruh lapisan masyarakat desa.
                        </p>
                    </div>
                </div>

                <!-- Misi 5 -->
                <div class="card">
                    <div class="card-body">
                        <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mb-4">
                            <span class="text-xl font-bold text-primary-600">5</span>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2">Pelestarian Budaya</h3>
                        <p class="text-sm text-gray-600">
                            Melestarikan kearifan lokal dan budaya Dayak sebagai identitas dan kekayaan desa.
                        </p>
                    </div>
                </div>

                <!-- Misi 6 -->
                <div class="card">
                    <div class="card-body">
                        <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center mb-4">
                            <span class="text-xl font-bold text-primary-600">6</span>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2">Tata Kelola Baik</h3>
                        <p class="text-sm text-gray-600">
                            Menerapkan prinsip good governance dalam pengelolaan pemerintahan desa yang bersih dan
                            akuntabel.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection