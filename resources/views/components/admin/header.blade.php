<!-- Admin Top Header -->
<header class="bg-white border-b border-gray-200 px-4 lg:px-6 py-3 sticky top-0 z-30">
    <div class="flex items-center justify-between gap-4">
        <!-- Mobile Menu Button -->
        <button onclick="toggleAdminSidebar()"
            class="lg:hidden p-2 rounded-lg text-gray-500 hover:bg-gray-100 flex-shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Page Title (Mobile) -->
        <h1 class="lg:hidden font-semibold text-gray-800 truncate">@yield('page-title', 'Dashboard')</h1>

        <!-- Search (Desktop) -->
        <div class="hidden lg:flex flex-1 max-w-md">
            <div class="relative w-full">
                <input type="text" placeholder="Cari..."
                    class="w-full pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-lg focus:border-primary-500 focus:ring-1 focus:ring-primary-500 bg-gray-50">
                <svg class="w-4 h-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

        <!-- Right Actions -->
        <div class="flex items-center gap-2">
            <!-- Notifications -->
            <button class="relative p-2 rounded-lg text-gray-500 hover:bg-gray-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                @php $pendingCount = \App\Models\PengajuanSurat::pending()->count(); @endphp
                @if($pendingCount > 0)
                    <span
                        class="absolute -top-0.5 -right-0.5 w-4 h-4 bg-red-500 text-white text-[10px] font-bold rounded-full flex items-center justify-center">{{ $pendingCount > 9 ? '9+' : $pendingCount }}</span>
                @endif
            </button>

            <!-- User Info -->
            <div class="hidden sm:flex items-center gap-2 pl-2 border-l border-gray-200">
                <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <span
                        class="text-primary-700 font-semibold text-xs">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</span>
                </div>
                <div class="hidden md:block">
                    <p class="text-sm font-medium text-gray-800 leading-tight">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-500">{{ auth()->user()->role_label }}</p>
                </div>
            </div>

            <!-- Logout -->
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="p-2 rounded-lg text-gray-400 hover:bg-red-50 hover:text-red-600"
                    title="Keluar">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</header>