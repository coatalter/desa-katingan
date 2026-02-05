@extends('layouts.public')

@section('title', 'Berita & Kegiatan')

@section('content')
    <section class="bg-gradient-to-br from-primary-600 to-primary-800 py-16 lg:py-24">
        <div class="container-custom text-center text-white">
            <h1 class="text-3xl lg:text-5xl font-bold mb-4">Berita & Kegiatan</h1>
            <p class="text-lg text-white/80 max-w-2xl mx-auto">
                Informasi terbaru seputar kegiatan dan perkembangan Desa Katingan
            </p>
        </div>
    </section>

    <section class="section bg-gray-50">
        <div class="container-custom">
            <!-- Filter Buttons -->
            <div class="mb-8 flex flex-wrap gap-3">
                <button class="btn btn-primary btn-sm filter-btn active" data-filter="all">Semua</button>
                <button class="btn btn-ghost btn-sm filter-btn" data-filter="kegiatan">Kegiatan</button>
                <button class="btn btn-ghost btn-sm filter-btn" data-filter="pengumuman">Pengumuman</button>
                <button class="btn btn-ghost btn-sm filter-btn" data-filter="pembangunan">Pembangunan</button>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($news as $item)
                    @php
                        $badgeColor = 'bg-primary-100 text-primary-800';
                        $gradient = 'from-primary-400 to-primary-600';
                        $filterCategory = strtolower($item->kategori);

                        if (stripos($filterCategory, 'pengumuman') !== false) {
                            $gradient = 'from-secondary-400 to-secondary-600';
                            $badgeColor = 'bg-secondary-100 text-secondary-800';
                        } elseif (stripos($filterCategory, 'pembangunan') !== false) {
                            $gradient = 'from-accent-400 to-accent-600';
                            $badgeColor = 'bg-accent-100 text-accent-800';
                        }
                    @endphp
                    <article class="card group cursor-pointer overflow-hidden news-item" data-category="{{ $filterCategory }}">
                        <div class="aspect-video bg-gradient-to-br {{ $gradient }} relative overflow-hidden">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                    class="w-full h-full object-cover mix-blend-overlay opacity-70 group-hover:opacity-90 transition-opacity">
                            @endif
                            <span class="badge bg-white/90 text-gray-800 absolute bottom-3 left-3">{{ $item->kategori }}</span>
                        </div>
                        <div class="card-body">
                            <p class="text-sm text-gray-500 mb-2">
                                {{ $item->published_at ? $item->published_at->format('d F Y') : '-' }}</p>
                            <h3
                                class="font-semibold text-gray-900 mb-2 line-clamp-2 group-hover:text-primary-600 transition-colors">
                                <a href="{{ route('news.detail', $item->slug) }}">
                                    {{ $item->judul }}
                                </a>
                            </h3>
                            <p class="text-sm text-gray-500 line-clamp-2">{{ $item->ringkasan }}</p>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada berita</h3>
                        <p class="text-gray-500">Berita desa akan segera ditambahkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const items = document.querySelectorAll('.news-item');

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

                        // Simple substring check for flexibility
                        if (filter === 'all' || category.includes(filter)) {
                            item.style.display = 'block';
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