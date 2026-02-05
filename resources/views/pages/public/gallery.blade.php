@extends('layouts.public')

@section('title', 'Galeri Desa')

@section('content')
    <section class="bg-gradient-to-br from-primary-600 to-primary-800 py-16 lg:py-24">
        <div class="container-custom text-center text-white">
            <h1 class="text-3xl lg:text-5xl font-bold mb-4">Galeri Desa Katingan</h1>
            <p class="text-lg text-white/80 max-w-2xl mx-auto">
                Dokumentasi kegiatan, pembangunan, dan keindahan alam Desa Katingan
            </p>
        </div>
    </section>

    <section class="section bg-gray-50">
        <div class="container-custom">
            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($gallery as $item)
                    <div class="group relative overflow-hidden rounded-xl shadow-lg cursor-pointer">
                        <div class="aspect-video relative">
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                                <div class="text-white">
                                    <h3 class="font-bold text-lg">{{ $item->judul }}</h3>
                                    @if($item->deskripsi)
                                        <p class="text-sm text-white/80 line-clamp-2">{{ $item->deskripsi }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada foto</h3>
                        <p class="text-gray-500">Galeri foto desa akan segera diupdate.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $gallery->links() }}
            </div>
        </div>
    </section>
@endsection