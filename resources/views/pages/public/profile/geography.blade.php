@extends('layouts.public')

@section('title', 'Geografi Desa')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[400px] flex items-center justify-center text-white overflow-hidden">
        <div class="absolute inset-0 bg-primary-900/60 z-10"></div>
        <img src="https://images.unsplash.com/photo-1500382017468-9049fee74a62?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80"
            class="absolute inset-0 w-full h-full object-cover" alt="Village Landscape">
        <div class="container mx-auto px-4 relative z-20 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Kondisi Geografis</h1>
            <p class="text-xl text-primary-100 max-w-2xl mx-auto">Mengenal letak wilayah dan potensi alam Desa Katingan.</p>
        </div>
    </section>

    <!-- Content -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-16 items-center mb-20">
                <div>
                    <span class="inline-block px-4 py-1.5 bg-primary-100 text-primary-700 rounded-full text-sm font-semibold mb-4">Letak Wilayah</span>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Posisi Strategis di Tengah Alam Katingan</h2>
                    <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                        Desa Katingan terletak di wilayah perbukitan yang subur dengan ketinggian rata-rata 200 mdpl. Wilayah kami diberkahi dengan tanah yang sangat cocok untuk pertanian dan perkebunan, serta dialiri oleh sungai yang menjadi sumber kehidupan warga.
                    </p>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="p-4 bg-gray-50 rounded-2xl">
                            <p class="text-sm text-gray-500 mb-1">Luas Wilayah</p>
                            <p class="text-xl font-bold text-gray-900">1,245.8 Ha</p>
                        </div>
                        <div class="p-4 bg-gray-50 rounded-2xl">
                            <p class="text-sm text-gray-500 mb-1">Ketinggian</p>
                            <p class="text-xl font-bold text-gray-900">200 mdpl</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-100 rounded-3xl h-[400px] flex items-center justify-center relative overflow-hidden shadow-2xl">
                     <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80"
                        class="absolute inset-0 w-full h-full object-cover" alt="Geography Section">
                </div>
            </div>

            <!-- Boundaries -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-primary-50 p-6 rounded-2xl border border-primary-100">
                    <p class="text-sm font-bold text-primary-800 uppercase mb-2">Batas Utara</p>
                    <p class="text-gray-600">Berbatasan dengan Hutan Lindung Bukit Katingan</p>
                </div>
                <div class="bg-secondary-50 p-6 rounded-2xl border border-secondary-100">
                    <p class="text-sm font-bold text-secondary-800 uppercase mb-2">Batas Selatan</p>
                    <p class="text-gray-600">Berbatasan dengan Sungai Besar Katingan</p>
                </div>
                <div class="bg-accent-50 p-6 rounded-2xl border border-accent-100">
                    <p class="text-sm font-bold text-accent-800 uppercase mb-2">Batas Timur</p>
                    <p class="text-gray-600">Berbatasan dengan Desa Makmur Sejahtera</p>
                </div>
                <div class="bg-primary-50 p-6 rounded-2xl border border-primary-100">
                    <p class="text-sm font-bold text-primary-800 uppercase mb-2">Batas Barat</p>
                    <p class="text-gray-600">Berbatasan dengan Kecamatan Mandiri Utama</p>
                </div>
            </div>
        </div>
    </section>
@endsection
