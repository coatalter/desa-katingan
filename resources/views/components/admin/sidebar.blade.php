<!-- Admin Sidebar -->
<aside id="admin-sidebar"
    class="fixed lg:static inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-gray-900 to-gray-800 transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
    <div class="flex flex-col h-full">
        <!-- Logo -->
        <div class="flex items-center gap-3 p-5 border-b border-gray-700/50">
            <div
                class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
            <div>
                <h1 class="font-bold text-white">Desa Katingan</h1>
                <p class="text-xs text-gray-400">Panel Admin</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
            <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Menu Utama</p>

            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-700/50' }} transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </a>

            <!-- Master Data -->
            @if(in_array(auth()->user()->role, ['admin', 'kepala_desa', 'sekretaris', 'kaur_pemerintahan']))
                <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mt-6 mb-3">Master Data</p>

                <a href="{{ route('admin.penduduk.index') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('admin.penduduk.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-700/50' }} transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Data Penduduk
                </a>

                <a href="{{ route('admin.keluarga.index') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('admin.keluarga.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-700/50' }} transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Kartu Keluarga
                </a>
            @endif

            <!-- Surat Menyurat -->
            @if(in_array(auth()->user()->role, ['admin', 'kepala_desa', 'sekretaris', 'kaur_pemerintahan', 'kaur_umum', 'petugas']))
                <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mt-6 mb-3">Surat Menyurat</p>

                <a href="{{ route('admin.surat.index') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('admin.surat.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-700/50' }} transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Pengajuan Surat
                    @php $pendingCount = \App\Models\PengajuanSurat::pending()->count(); @endphp
                    @if($pendingCount > 0)
                        <span
                            class="ml-auto bg-red-500 text-white text-xs font-medium px-2 py-0.5 rounded-full">{{ $pendingCount }}</span>
                    @endif
                </a>

                @if(in_array(auth()->user()->role, ['admin', 'sekretaris']))
                    <a href="{{ route('admin.jenis-surat.index') }}"
                        class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('admin.jenis-surat.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-700/50' }} transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Jenis Surat
                    </a>
                @endif
            @endif

            <!-- Konten -->
            <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mt-6 mb-3">Konten</p>

            <a href="{{ route('admin.berita.index') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('admin.berita.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-700/50' }} transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                Berita
            </a>

            <a href="{{ route('admin.potensi.index') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('admin.potensi.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-700/50' }} transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Potensi Desa
            </a>

            <a href="{{ route('admin.galeri.index') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('admin.galeri.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-700/50' }} transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Galeri Foto
            </a>

            <!-- Pengaturan -->
            @if(in_array(auth()->user()->role, ['admin', 'kepala_desa']))
                <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mt-6 mb-3">Pengaturan</p>

                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('admin.users.*') ? 'bg-primary-600 text-white' : 'text-gray-300 hover:bg-gray-700/50' }} transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m-3.354-2.17A4 4 0 0112 8" />
                    </svg>
                    Manajemen User
                </a>
            @endif
        </nav>

        <!-- User Info -->
        <div class="p-4 border-t border-gray-700/50">
            <div class="flex items-center gap-3 p-3 bg-gray-700/30 rounded-xl">
                <div class="w-10 h-10 bg-primary-600 rounded-full flex items-center justify-center">
                    <span class="text-white font-semibold text-sm">{{ substr(auth()->user()->name, 0, 2) }}</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-white truncate">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-400 truncate">{{ ucwords(str_replace('_', ' ', auth()->user()->role)) }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</aside>