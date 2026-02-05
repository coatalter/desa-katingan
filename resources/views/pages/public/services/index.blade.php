@extends('layouts.public')

@section('title', 'Layanan Surat')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-primary-600 to-primary-800 py-16 lg:py-24">
        <div class="container-custom text-center text-white">
            <h1 class="text-3xl lg:text-5xl font-bold mb-4">Layanan Surat Online</h1>
            <p class="text-lg text-white/80 max-w-2xl mx-auto">
                Ajukan berbagai jenis surat secara online. Proses cepat, transparan, dan dapat dipantau kapan saja.
            </p>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="section bg-gray-50">
        <div class="container-custom">
            <!-- Search & Filter -->
            <div class="mb-8">
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="flex-1">
                            <div class="relative">
                                <input type="text" id="search-input" placeholder="Cari jenis surat..." class="input-field input-with-icon">
                                <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services List -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="services-grid">
                @forelse($jenisSurats as $surat)
                    <div class="card service-card" data-name="{{ strtolower($surat->nama) }}">
                        <div class="card-body">
                            <!-- Icon -->
                            <div class="w-14 h-14 bg-primary-100 rounded-xl flex items-center justify-center mb-4">
                                @switch($surat->icon)
                                    @case('home')
                                        <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        @break
                                    @case('briefcase')
                                        <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        @break
                                    @case('shield-check')
                                        <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                        @break
                                    @case('heart')
                                        <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                        @break
                                    @case('user-plus')
                                        <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                        </svg>
                                        @break
                                    @case('document')
                                        <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        @break
                                    @default
                                        <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                @endswitch
                            </div>
                            
                            <!-- Badge -->
                            <span class="badge badge-success mb-2">{{ $surat->kode }}</span>
                            
                            <!-- Title & Description -->
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $surat->nama }}</h3>
                            <p class="text-sm text-gray-500 mb-4 line-clamp-2">
                                {{ $surat->deskripsi }}
                            </p>
                            
                            <!-- Footer -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <div class="text-sm text-gray-500">
                                    <span class="text-primary-600 font-medium">Gratis</span> • {{ $surat->estimasi_hari }} hari kerja
                                </div>
                                <a href="{{ route('services.detail', $surat->slug) }}"
                                    class="text-primary-600 font-medium text-sm hover:text-primary-700">
                                    Ajukan →
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada layanan tersedia</h3>
                        <p class="text-gray-500">Layanan surat akan segera tersedia.</p>
                    </div>
                @endforelse
            </div>

            <!-- Info Box -->
            <div class="mt-12 bg-primary-50 border border-primary-200 rounded-2xl p-6 lg:p-8">
                <div class="flex flex-col lg:flex-row items-center gap-6">
                    <div class="w-16 h-16 bg-primary-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-center lg:text-left flex-grow">
                        <h3 class="text-lg font-semibold text-primary-800 mb-2">Cara Mengajukan Surat</h3>
                        <p class="text-primary-700">
                            Pilih jenis surat yang dibutuhkan, isi formulir dengan lengkap, dan upload dokumen pendukung. 
                            Anda akan mendapat kode tracking untuk memantau status pengajuan.
                        </p>
                    </div>
                    <a href="{{ route('tracking') }}" class="btn btn-primary flex-shrink-0">
                        Cek Status Pengajuan
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Simple search functionality
    const searchInput = document.getElementById('search-input');
    const serviceCards = document.querySelectorAll('.service-card');
    
    searchInput.addEventListener('input', function() {
        const query = this.value.toLowerCase();
        
        serviceCards.forEach(card => {
            const name = card.dataset.name;
            if (name.includes(query)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
</script>
@endpush