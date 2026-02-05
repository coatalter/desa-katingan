@extends('layouts.public')

@section('title', 'Sejarah Desa')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-primary-600 to-primary-800 py-16 lg:py-24">
        <div class="container-custom text-center text-white">
            <nav class="text-sm mb-4">
                <a href="{{ route('home') }}" class="text-white/70 hover:text-white">Beranda</a>
                <span class="mx-2 text-white/50">/</span>
                <span>Sejarah Desa</span>
            </nav>
            <h1 class="text-3xl lg:text-5xl font-bold mb-4">Sejarah Desa Katingan</h1>
            <p class="text-lg text-white/80 max-w-2xl mx-auto">
                Mengenal lebih dekat perjalanan panjang Desa Katingan dari masa ke masa
            </p>
        </div>
    </section>

    <!-- Content -->
    <section class="section bg-white">
        <div class="container-custom">
            <div class="max-w-4xl mx-auto">
                <div class="prose prose-lg max-w-none">
                    <p class="lead text-xl text-gray-600 mb-8">
                        Desa Katingan merupakan salah satu desa tertua di Kabupaten Katingan, Kalimantan Tengah, yang telah
                        berdiri sejak era Kerajaan Kutai pada abad ke-17.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mt-12 mb-4">Asal Usul Nama</h2>
                    <p class="text-gray-600 mb-6">
                        Nama "Katingan" berasal dari bahasa Dayak Ngaju yang berarti "air yang jernih". Hal ini merujuk pada
                        sungai Katingan yang mengalir di sepanjang wilayah desa dengan airnya yang bening dan bersih.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mt-12 mb-4">Masa Kolonial</h2>
                    <p class="text-gray-600 mb-6">
                        Pada masa penjajahan Belanda, Desa Katingan menjadi salah satu pusat perdagangan hasil bumi seperti
                        rotan, damar, dan getah karet. Masyarakat desa turut berperan dalam perjuangan kemerdekaan
                        Indonesia.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-900 mt-12 mb-4">Era Modern</h2>
                    <p class="text-gray-600 mb-6">
                        Memasuki era modern, Desa Katingan terus berkembang dengan pesat. Infrastruktur dibangun, akses
                        pendidikan diperluas, dan teknologi mulai masuk ke pelosok desa. Kini, Desa Katingan telah menjadi
                        salah satu desa maju di Kalimantan Tengah.
                    </p>

                    <div class="bg-primary-50 rounded-2xl p-8 mt-12">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Pencapaian Desa</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Penghargaan Desa Terbaik Provinsi Kalimantan Tengah 2024</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>Sertifikasi Desa Digital tahun 2023</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>100% akses listrik dan air bersih untuk seluruh warga</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection