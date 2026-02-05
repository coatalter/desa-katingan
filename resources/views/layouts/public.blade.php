<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portal Layanan Desa Katingan - Melayani dengan Hati, Membangun dengan Teknologi">
    <meta name="keywords" content="desa katingan, layanan desa, surat online, administrasi desa">
    <meta name="author" content="Desa Katingan">

    <title>@yield('title', 'Desa Katingan') - Portal Layanan Desa</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('logo-desa.png') }}">

    <!-- Google Fonts - Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Additional Styles -->
    @stack('styles')
</head>

<body class="min-h-screen flex flex-col">
    <!-- Skip to content link for accessibility -->
    <a href="#main-content"
        class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-primary-600 text-white px-4 py-2 rounded-lg z-50">
        Skip to main content
    </a>

    <!-- Navigation -->
    @include('components.layout.navbar')

    <!-- Main Content -->
    <main id="main-content" class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.layout.footer')

    <!-- Mobile Menu Overlay -->
    @include('components.layout.mobile-menu')

    <!-- Additional Scripts -->
    @stack('scripts')

    <!-- Mobile Menu Script -->
    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuClose = document.getElementById('mobile-menu-close');
        const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');

        function openMobileMenu() {
            mobileMenu.classList.remove('translate-x-full');
            mobileMenuOverlay.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeMobileMenu() {
            mobileMenu.classList.add('translate-x-full');
            mobileMenuOverlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        if (mobileMenuButton) {
            mobileMenuButton.addEventListener('click', openMobileMenu);
        }

        if (mobileMenuClose) {
            mobileMenuClose.addEventListener('click', closeMobileMenu);
        }

        if (mobileMenuOverlay) {
            mobileMenuOverlay.addEventListener('click', closeMobileMenu);
        }

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-lg', 'bg-white/95', 'backdrop-blur-lg');
                navbar.classList.remove('bg-white');
            } else {
                navbar.classList.remove('shadow-lg', 'bg-white/95', 'backdrop-blur-lg');
                navbar.classList.add('bg-white');
            }
        });
    </script>
</body>

</html>