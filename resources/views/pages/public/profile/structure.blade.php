@extends('layouts.public')

@section('title', 'Struktur Organisasi')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-primary-600 to-primary-800 py-16 lg:py-24">
        <div class="container-custom text-center text-white">
            <nav class="text-sm mb-4">
                <a href="{{ route('home') }}" class="text-white/70 hover:text-white">Beranda</a>
                <span class="mx-2 text-white/50">/</span>
                <span>Struktur Organisasi</span>
            </nav>
            <h1 class="text-3xl lg:text-5xl font-bold mb-4">Struktur Organisasi</h1>
            <p class="text-lg text-white/80 max-w-2xl mx-auto">
                Susunan perangkat desa yang bertugas melayani masyarakat Desa Katingan
            </p>
        </div>
    </section>

    <!-- Organization Chart -->
    <section class="section bg-white">
        <div class="container-custom">
            <!-- Kepala Desa -->
            <div class="text-center mb-12">
                <div class="inline-block">
                    <div class="card w-72 mx-auto">
                        <div class="card-body text-center">
                            <div
                                class="w-24 h-24 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full mx-auto mb-4 flex items-center justify-center text-white text-3xl font-bold shadow-lg">
                                AB
                            </div>
                            <h3 class="font-bold text-gray-900 text-lg">Ahmad Budiman, S.Sos</h3>
                            <p class="text-primary-600 font-medium">Kepala Desa</p>
                            <p class="text-sm text-gray-500 mt-2">Periode 2022-2028</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Connector Line -->
            <div class="flex justify-center mb-8">
                <div class="w-0.5 h-12 bg-gray-300"></div>
            </div>

            <!-- Second Row - Sekretaris -->
            <div class="text-center mb-12">
                <div class="inline-block">
                    <div class="card w-64 mx-auto">
                        <div class="card-body text-center">
                            <div
                                class="w-20 h-20 bg-gradient-to-br from-secondary-400 to-secondary-500 rounded-full mx-auto mb-4 flex items-center justify-center text-white text-2xl font-bold">
                                SW
                            </div>
                            <h3 class="font-bold text-gray-900">Siti Wahyuni, S.Pd</h3>
                            <p class="text-secondary-600 font-medium text-sm">Sekretaris Desa</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Connector Line -->
            <div class="flex justify-center mb-8">
                <div class="w-3/4 max-w-3xl h-0.5 bg-gray-300"></div>
            </div>

            <!-- Third Row - Kaur -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
                <div class="card">
                    <div class="card-body text-center p-4">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-accent-400 to-accent-500 rounded-full mx-auto mb-3 flex items-center justify-center text-white text-xl font-bold">
                            RS
                        </div>
                        <h4 class="font-semibold text-gray-900 text-sm">Rahmat Susilo</h4>
                        <p class="text-accent-600 text-xs font-medium">Kaur Umum</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body text-center p-4">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-500 rounded-full mx-auto mb-3 flex items-center justify-center text-white text-xl font-bold">
                            DW
                        </div>
                        <h4 class="font-semibold text-gray-900 text-sm">Dewi Wulandari</h4>
                        <p class="text-green-600 text-xs font-medium">Kaur Keuangan</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body text-center p-4">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-500 rounded-full mx-auto mb-3 flex items-center justify-center text-white text-xl font-bold">
                            BP
                        </div>
                        <h4 class="font-semibold text-gray-900 text-sm">Budi Pratama</h4>
                        <p class="text-purple-600 text-xs font-medium">Kaur Perencanaan</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body text-center p-4">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-pink-400 to-pink-500 rounded-full mx-auto mb-3 flex items-center justify-center text-white text-xl font-bold">
                            MR
                        </div>
                        <h4 class="font-semibold text-gray-900 text-sm">Maya Rizki</h4>
                        <p class="text-pink-600 text-xs font-medium">Kaur Kesra</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section bg-gray-50">
        <div class="container-custom">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                    <div class="grid lg:grid-cols-2">
                        <div class="p-8 lg:p-12">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Hubungi Kami</h2>

                            <div class="space-y-6">
                                <div class="flex gap-4">
                                    <div
                                        class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Alamat</h4>
                                        <p class="text-gray-600">Jl. Desa Katingan No. 01, Kec. Katingan, Kalimantan Tengah
                                        </p>
                                    </div>
                                </div>

                                <div class="flex gap-4">
                                    <div
                                        class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Telepon</h4>
                                        <p class="text-gray-600">(0536) 123-4567</p>
                                    </div>
                                </div>

                                <div class="flex gap-4">
                                    <div
                                        class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Jam Operasional</h4>
                                        <p class="text-gray-600">Senin - Jumat: 08:00 - 16:00 WIB</p>
                                        <p class="text-gray-600">Sabtu: 08:00 - 12:00 WIB</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-primary-600 p-8 lg:p-12 text-white">
                            <h3 class="text-xl font-bold mb-4">Layanan Cepat</h3>
                            <p class="text-white/80 mb-6">
                                Hubungi kami melalui WhatsApp untuk respon yang lebih cepat
                            </p>
                            <a href="https://wa.me/6281234567890"
                                class="btn bg-white text-primary-700 hover:bg-gray-100 w-full justify-center">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654z" />
                                </svg>
                                Chat WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection