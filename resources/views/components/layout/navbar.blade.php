<!-- Navigation Bar -->
<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 bg-white transition-all duration-300">
    <div class="container-custom">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div
                    class="w-12 h-12 bg-gradient-to-br from-primary-600 to-primary-700 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-shadow">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-900">Desa Katingan</h1>
                    <p class="text-xs text-gray-500">Portal Layanan Desa</p>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center gap-1">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    Beranda
                </a>

                <!-- Profil Dropdown -->
                <div class="relative group">
                    <button class="nav-link flex items-center gap-1">
                        Profil Desa
                        <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        class="absolute top-full left-0 pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                        <div class="bg-white rounded-xl shadow-xl border border-gray-100 py-2 min-w-48">
                            <a href="{{ route('profile.history') }}"
                                class="block px-4 py-2 text-gray-600 hover:bg-primary-50 hover:text-primary-600">Sejarah
                                Desa</a>
                            <a href="{{ route('profile.vision') }}"
                                class="block px-4 py-2 text-gray-600 hover:bg-primary-50 hover:text-primary-600">Visi &
                                Misi</a>
                            <a href="{{ route('profile.geography') }}"
                                class="block px-4 py-2 text-gray-600 hover:bg-primary-50 hover:text-primary-600">Kondisi
                                Geografis</a>
                            <a href="{{ route('profile.structure') }}"
                                class="block px-4 py-2 text-gray-600 hover:bg-primary-50 hover:text-primary-600">Struktur
                                Organisasi</a>
                        </div>
                    </div>
                </div>

                <a href="{{ route('services') }}"
                    class="nav-link {{ request()->routeIs('services*') ? 'active' : '' }}">
                    Layanan Surat
                </a>
                <a href="{{ route('potentials') }}"
                    class="nav-link {{ request()->routeIs('potentials*') ? 'active' : '' }}">
                    Potensi Desa
                </a>
                <a href="{{ route('statistics') }}"
                    class="nav-link {{ request()->routeIs('statistics') ? 'active' : '' }}">
                    Statistik
                </a>
                <a href="{{ route('gallery') }}" class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}">
                    Galeri
                </a>
                <a href="{{ route('news') }}" class="nav-link {{ request()->routeIs('news*') ? 'active' : '' }}">
                    Berita
                </a>
            </div>

            <!-- Action Buttons -->
            <div class="hidden lg:flex items-center gap-3">
                <a href="{{ route('tracking') }}" class="btn btn-primary btn-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Cek Status Surat
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
</nav>

<!-- Spacer for fixed navbar -->
<div class="h-20"></div>