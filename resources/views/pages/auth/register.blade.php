<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Portal Desa Katingan</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Left Side - Branding -->
        <div class="hidden lg:flex lg:w-2/5 gradient-hero relative overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="register-pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                            <circle cx="20" cy="20" r="1" fill="white" />
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#register-pattern)" />
                </svg>
            </div>

            <div class="absolute top-20 left-10 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-secondary-500/20 rounded-full blur-3xl"></div>

            <div class="relative z-10 flex flex-col justify-center items-center text-center px-12">
                <div class="w-24 h-24 bg-white/20 backdrop-blur rounded-3xl flex items-center justify-center mb-8">
                    <svg class="w-14 h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-white mb-4">Daftar Akun Baru</h1>
                <p class="text-lg text-white/80 mb-8">Bergabung dan nikmati kemudahan layanan administrasi desa secara
                    online</p>

                <div class="space-y-4 text-left w-full max-w-xs">
                    <div class="flex items-center gap-3 text-white/80">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span>Ajukan surat dari rumah</span>
                    </div>
                    <div class="flex items-center gap-3 text-white/80">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span>Pantau status real-time</span>
                    </div>
                    <div class="flex items-center gap-3 text-white/80">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span>Notifikasi via WhatsApp</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="w-full lg:w-3/5 flex items-center justify-center p-8">
            <div class="w-full max-w-lg">
                <!-- Mobile Logo -->
                <div class="lg:hidden flex items-center justify-center gap-3 mb-8">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-primary-600 to-primary-700 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-gray-900">Desa Katingan</span>
                </div>

                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Buat Akun Baru</h2>
                        <p class="text-gray-600">Isi data sesuai KTP Anda</p>
                    </div>

                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                            <ul class="list-disc list-inside text-sm text-red-700">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('register.post') }}" method="POST" class="space-y-5">
                        @csrf

                        <div class="input-group">
                            <label for="nik" class="input-label">NIK (16 digit) <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="nik" name="nik" value="{{ old('nik') }}" class="input-field"
                                placeholder="Masukkan NIK" maxlength="16" inputmode="numeric" required>
                        </div>

                        <div class="input-group">
                            <label for="nama" class="input-label">Nama Lengkap <span
                                    class="text-red-500">*</span></label>
                            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" class="input-field"
                                placeholder="Sesuai KTP" required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="input-group">
                                <label for="no_hp" class="input-label">No. WhatsApp <span
                                        class="text-red-500">*</span></label>
                                <input type="tel" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" class="input-field"
                                    placeholder="08xxxxxxxxxx" required>
                            </div>
                            <div class="input-group">
                                <label for="email" class="input-label">Email (Opsional)</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="input-field" placeholder="email@contoh.com">
                            </div>
                        </div>

                        <div class="input-group">
                            <label for="password" class="input-label">Password <span
                                    class="text-red-500">*</span></label>
                            <input type="password" id="password" name="password" class="input-field"
                                placeholder="Minimal 6 karakter" required>
                        </div>

                        <div class="input-group">
                            <label for="password_confirmation" class="input-label">Konfirmasi Password <span
                                    class="text-red-500">*</span></label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="input-field" placeholder="Ulangi password" required>
                        </div>

                        <div class="flex items-start gap-2">
                            <input type="checkbox" id="agree" name="agree"
                                class="w-4 h-4 rounded border-gray-300 text-primary-600 mt-0.5" required>
                            <label for="agree" class="text-sm text-gray-600">
                                Saya menyetujui <a href="#" class="text-primary-600 hover:underline">syarat &
                                    ketentuan</a> serta <a href="#" class="text-primary-600 hover:underline">kebijakan
                                    privasi</a>
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary w-full justify-center">
                            Daftar Sekarang
                        </button>
                    </form>

                    <div class="text-center mt-6">
                        <p class="text-gray-600">
                            Sudah punya akun? <a href="{{ route('login') }}"
                                class="text-primary-600 hover:text-primary-700 font-semibold">Masuk</a>
                        </p>
                    </div>
                </div>

                <div class="text-center mt-6">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center gap-2 text-gray-500 hover:text-primary-600 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('nik').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16);
        });
    </script>
</body>

</html>