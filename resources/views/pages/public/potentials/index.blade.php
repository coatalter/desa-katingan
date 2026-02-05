@extends('layouts.public')

@section('title', 'Potensi Desa')

@section('content')
    <section class="bg-gradient-to-br from-primary-600 to-primary-800 py-16 lg:py-24">
        <div class="container-custom text-center text-white">
            <h1 class="text-3xl lg:text-5xl font-bold mb-4">Potensi Desa Katingan</h1>
            <p class="text-lg text-white/80 max-w-2xl mx-auto">
                Jelajahi UMKM, wisata, dan potensi ekonomi unggulan Desa Katingan
            </p>
        </div>
    </section>

    <section class="section bg-gray-50">
        <div class="container-custom">
            <!-- Filter Buttons -->
            <div class="mb-8 flex flex-wrap gap-3" id="filter-buttons">
                <button class="btn btn-primary btn-sm filter-btn active" data-filter="all">Semua</button>
                <button class="btn btn-ghost btn-sm filter-btn" data-filter="umkm">� UMKM</button>
                <button class="btn btn-ghost btn-sm filter-btn" data-filter="wisata">🏖️ Wisata</button>
                <button class="btn btn-ghost btn-sm filter-btn" data-filter="pertanian">🌾 Pertanian</button>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" id="potensi-grid">
                @forelse($potentials as $potensi)
                    <!-- Determine badge color and gradient based on category -->
                    @php
                        $badgeColor = 'bg-blue-100 text-blue-800';
                        $gradient = 'from-blue-400 to-blue-600';
                        $displayCategory = $potensi->kategori;
                        $filterCategory = 'other';

                        if (in_array(strtolower($potensi->kategori), ['kuliner', 'kerajinan', 'jasa', 'umkm'])) {
                            $badgeColor = 'bg-white/90 text-green-700';
                            $gradient = 'from-green-400 to-green-600';
                            $filterCategory = 'umkm';
                        } elseif (strpos(strtolower($potensi->kategori), 'wisata') !== false) {
                            $badgeColor = 'bg-white/90 text-blue-700';
                            $gradient = 'from-blue-400 to-blue-600';
                            $filterCategory = 'wisata';
                        } elseif (strpos(strtolower($potensi->kategori), 'tani') !== false || strpos(strtolower($potensi->kategori), 'kebun') !== false || strtolower($potensi->kategori) == 'pertanian') {
                            $badgeColor = 'bg-white/90 text-yellow-700';
                            $gradient = 'from-yellow-400 to-yellow-600';
                            $filterCategory = 'pertanian';
                        }
                    @endphp

                    <div class="card group cursor-pointer potential-item" data-category="{{ $filterCategory }}">
                        <div class="aspect-video bg-gradient-to-br {{ $gradient }} relative overflow-hidden">
                            @if($potensi->gambar)
                                <img src="{{ asset('storage/' . $potensi->gambar) }}" alt="{{ $potensi->nama }}" class="w-full h-full object-cover mix-blend-overlay opacity-70 group-hover:opacity-90 transition-opacity">
                            @endif
                            <span class="badge {{ $badgeColor }} absolute top-3 left-3">{{ $potensi->kategori }}</span>
                        </div>
                        <div class="card-body">
                            <h3 class="font-semibold text-gray-900 mb-1 group-hover:text-primary-600 transition-colors">{{ $potensi->nama }}</h3>
                            <p class="text-sm text-gray-500 mb-3 line-clamp-2">{{ $potensi->deskripsi }}</p>
                            
                            @if($potensi->alamat)
                            <div class="flex items-center gap-2 text-sm text-gray-400">
                                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="truncate">{{ $potensi->alamat }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada data potensi</h3>
                        <p class="text-gray-500">Data potensi desa akan segera ditambahkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const items = document.querySelectorAll('.potential-item');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Update active state
                filterButtons.forEach(btn => {
                    btn.classList.remove('active', 'btn-primary');
                    btn.classList.add('btn-ghost');
                });
                button.classList.add('active', 'btn-primary');
                button.classList.remove('btn-ghost');

                const filter = button.getAttribute('data-filter');

                items.forEach(item => {
                    const category = item.getAttribute('data-category');
                    
                    if (filter === 'all' || category === filter) {
                        item.style.display = 'block';
                        // Add animation class if you like
                        item.animate([
                            { opacity: 0, transform: 'scale(0.95)' },
                            { opacity: 1, transform: 'scale(1)' }
                        ], {
                            duration: 300,
                            easing: 'ease-out'
                        });
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endpush