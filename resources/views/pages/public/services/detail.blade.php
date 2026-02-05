@extends('layouts.public')

@section('title', $jenisSurat->nama)

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-primary-600 to-primary-800 py-12 lg:py-16">
        <div class="container-custom">
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-2 text-sm text-white/70">
                    <li><a href="{{ route('home') }}" class="hover:text-white">Beranda</a></li>
                    <li><span>/</span></li>
                    <li><a href="{{ route('services') }}" class="hover:text-white">Layanan</a></li>
                    <li><span>/</span></li>
                    <li class="text-white">{{ $jenisSurat->nama }}</li>
                </ol>
            </nav>
            <h1 class="text-2xl lg:text-4xl font-bold text-white mb-2">{{ $jenisSurat->nama }}</h1>
            <p class="text-white/80">{{ $jenisSurat->deskripsi }}</p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="section bg-gray-50">
        <div class="container-custom">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left: Form Pengajuan -->
                <div class="lg:col-span-2">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-xl font-bold text-gray-900 mb-6">Form Pengajuan</h2>

                            @if(session('success'))
                                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div>
                                            <p class="font-medium text-green-800">{{ session('success') }}</p>
                                            @if(session('tracking_code'))
                                                <p class="text-sm text-green-700 mt-1">
                                                    Kode Tracking: <strong class="font-mono">{{ session('tracking_code') }}</strong>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                                    <ul class="text-sm text-red-700 space-y-1">
                                        @foreach($errors->all() as $error)
                                            <li>• {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('services.submit', $jenisSurat->slug) }}" method="POST"
                                enctype="multipart/form-data" class="space-y-6">
                                @csrf

                                <!-- NIK Input -->
                                <div>
                                    <label for="nik" class="input-label">NIK (Nomor Induk Kependudukan) <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="nik" name="nik" value="{{ old('nik') }}" class="input-field"
                                        placeholder="Masukkan 16 digit NIK" maxlength="16" pattern="[0-9]{16}" required>
                                    <p class="text-xs text-gray-500 mt-1">NIK harus terdaftar di database desa</p>
                                </div>

                                <!-- Keperluan -->
                                <div>
                                    <label for="keperluan" class="input-label">Keperluan <span
                                            class="text-red-500">*</span></label>
                                    <textarea id="keperluan" name="keperluan" rows="3" class="input-field"
                                        placeholder="Jelaskan keperluan surat ini"
                                        required>{{ old('keperluan') }}</textarea>
                                </div>

                                <!-- Dynamic Fields based on letter type -->
                                @if($jenisSurat->slug === 'surat-domisili')
                                    <div>
                                        <label for="alamat_tujuan" class="input-label">Alamat Tujuan Domisili</label>
                                        <input type="text" id="alamat_tujuan" name="data_tambahan[alamat_tujuan]"
                                            value="{{ old('data_tambahan.alamat_tujuan') }}" class="input-field"
                                            placeholder="Alamat lengkap domisili">
                                    </div>
                                    <div>
                                        <label for="lama_tinggal" class="input-label">Lama Tinggal</label>
                                        <input type="text" id="lama_tinggal" name="data_tambahan[lama_tinggal]"
                                            value="{{ old('data_tambahan.lama_tinggal') }}" class="input-field"
                                            placeholder="Contoh: 5 tahun">
                                    </div>
                                @endif

                                @if($jenisSurat->slug === 'surat-usaha')
                                    <div>
                                        <label for="nama_usaha" class="input-label">Nama Usaha <span
                                                class="text-red-500">*</span></label>
                                        <input type="text" id="nama_usaha" name="data_tambahan[nama_usaha]"
                                            value="{{ old('data_tambahan.nama_usaha') }}" class="input-field"
                                            placeholder="Nama usaha Anda" required>
                                    </div>
                                    <div>
                                        <label for="jenis_usaha" class="input-label">Jenis Usaha <span
                                                class="text-red-500">*</span></label>
                                        <select id="jenis_usaha" name="data_tambahan[jenis_usaha]" class="input-field" required>
                                            <option value="">Pilih jenis usaha</option>
                                            <option value="Perdagangan" {{ old('data_tambahan.jenis_usaha') == 'Perdagangan' ? 'selected' : '' }}>Perdagangan</option>
                                            <option value="Jasa" {{ old('data_tambahan.jenis_usaha') == 'Jasa' ? 'selected' : '' }}>Jasa</option>
                                            <option value="Produksi" {{ old('data_tambahan.jenis_usaha') == 'Produksi' ? 'selected' : '' }}>Produksi</option>
                                            <option value="Pertanian" {{ old('data_tambahan.jenis_usaha') == 'Pertanian' ? 'selected' : '' }}>Pertanian</option>
                                            <option value="Lainnya" {{ old('data_tambahan.jenis_usaha') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="alamat_usaha" class="input-label">Alamat Usaha <span
                                                class="text-red-500">*</span></label>
                                        <textarea id="alamat_usaha" name="data_tambahan[alamat_usaha]" rows="2"
                                            class="input-field" placeholder="Alamat lengkap tempat usaha"
                                            required>{{ old('data_tambahan.alamat_usaha') }}</textarea>
                                    </div>
                                @endif

                                @if($jenisSurat->slug === 'surat-skck')
                                    <div>
                                        <label for="keperluan_skck" class="input-label">Keperluan SKCK <span
                                                class="text-red-500">*</span></label>
                                        <select id="keperluan_skck" name="data_tambahan[keperluan_skck]" class="input-field"
                                            required>
                                            <option value="">Pilih keperluan</option>
                                            <option value="Melamar Pekerjaan" {{ old('data_tambahan.keperluan_skck') == 'Melamar Pekerjaan' ? 'selected' : '' }}>Melamar Pekerjaan</option>
                                            <option value="Pendaftaran TNI/Polri" {{ old('data_tambahan.keperluan_skck') == 'Pendaftaran TNI/Polri' ? 'selected' : '' }}>Pendaftaran TNI/Polri</option>
                                            <option value="Pendaftaran CPNS" {{ old('data_tambahan.keperluan_skck') == 'Pendaftaran CPNS' ? 'selected' : '' }}>
                                                Pendaftaran CPNS</option>
                                            <option value="Visa/Perjalanan LN" {{ old('data_tambahan.keperluan_skck') == 'Visa/Perjalanan LN' ? 'selected' : '' }}>
                                                Visa/Perjalanan Luar Negeri</option>
                                            <option value="Lainnya" {{ old('data_tambahan.keperluan_skck') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                    </div>
                                @endif

                                @if($jenisSurat->slug === 'surat-tidak-mampu')
                                    <div>
                                        <label for="penghasilan" class="input-label">Penghasilan per Bulan <span
                                                class="text-red-500">*</span></label>
                                        <select id="penghasilan" name="data_tambahan[penghasilan]" class="input-field" required>
                                            <option value="">Pilih range penghasilan</option>
                                            <option value="< Rp 500.000" {{ old('data_tambahan.penghasilan') == '< Rp 500.000' ? 'selected' : '' }}>Kurang dari Rp 500.000</option>
                                            <option value="Rp 500.000 - Rp 1.000.000" {{ old('data_tambahan.penghasilan') == 'Rp 500.000 - Rp 1.000.000' ? 'selected' : '' }}>Rp 500.000 - Rp 1.000.000</option>
                                            <option value="Rp 1.000.000 - Rp 2.000.000" {{ old('data_tambahan.penghasilan') == 'Rp 1.000.000 - Rp 2.000.000' ? 'selected' : '' }}>Rp 1.000.000 - Rp 2.000.000
                                            </option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="tanggungan" class="input-label">Jumlah Tanggungan <span
                                                class="text-red-500">*</span></label>
                                        <input type="number" id="tanggungan" name="data_tambahan[tanggungan]"
                                            value="{{ old('data_tambahan.tanggungan') }}" class="input-field"
                                            placeholder="Jumlah anggota keluarga yang ditanggung" min="0" required>
                                    </div>
                                @endif

                                @if($jenisSurat->slug === 'surat-kelahiran')
                                    <div>
                                        <label for="nama_bayi" class="input-label">Nama Bayi <span
                                                class="text-red-500">*</span></label>
                                        <input type="text" id="nama_bayi" name="data_tambahan[nama_bayi]"
                                            value="{{ old('data_tambahan.nama_bayi') }}" class="input-field"
                                            placeholder="Nama lengkap bayi" required>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="tanggal_lahir_bayi" class="input-label">Tanggal Lahir <span
                                                    class="text-red-500">*</span></label>
                                            <input type="date" id="tanggal_lahir_bayi" name="data_tambahan[tanggal_lahir_bayi]"
                                                value="{{ old('data_tambahan.tanggal_lahir_bayi') }}" class="input-field"
                                                required>
                                        </div>
                                        <div>
                                            <label for="jenis_kelamin_bayi" class="input-label">Jenis Kelamin <span
                                                    class="text-red-500">*</span></label>
                                            <select id="jenis_kelamin_bayi" name="data_tambahan[jenis_kelamin_bayi]"
                                                class="input-field" required>
                                                <option value="">Pilih</option>
                                                <option value="Laki-laki" {{ old('data_tambahan.jenis_kelamin_bayi') == 'Laki-laki' ? 'selected' : '' }}>
                                                    Laki-laki</option>
                                                <option value="Perempuan" {{ old('data_tambahan.jenis_kelamin_bayi') == 'Perempuan' ? 'selected' : '' }}>
                                                    Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="nama_ayah" class="input-label">Nama Ayah <span
                                                class="text-red-500">*</span></label>
                                        <input type="text" id="nama_ayah" name="data_tambahan[nama_ayah]"
                                            value="{{ old('data_tambahan.nama_ayah') }}" class="input-field"
                                            placeholder="Nama lengkap ayah" required>
                                    </div>
                                    <div>
                                        <label for="nama_ibu" class="input-label">Nama Ibu <span
                                                class="text-red-500">*</span></label>
                                        <input type="text" id="nama_ibu" name="data_tambahan[nama_ibu]"
                                            value="{{ old('data_tambahan.nama_ibu') }}" class="input-field"
                                            placeholder="Nama lengkap ibu" required>
                                    </div>
                                @endif

                                @if($jenisSurat->slug === 'surat-kematian')
                                    <div>
                                        <label for="nama_almarhum" class="input-label">Nama Almarhum/ah <span
                                                class="text-red-500">*</span></label>
                                        <input type="text" id="nama_almarhum" name="data_tambahan[nama_almarhum]"
                                            value="{{ old('data_tambahan.nama_almarhum') }}" class="input-field"
                                            placeholder="Nama lengkap almarhum/ah" required>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="tanggal_meninggal" class="input-label">Tanggal Meninggal <span
                                                    class="text-red-500">*</span></label>
                                            <input type="date" id="tanggal_meninggal" name="data_tambahan[tanggal_meninggal]"
                                                value="{{ old('data_tambahan.tanggal_meninggal') }}" class="input-field"
                                                required>
                                        </div>
                                        <div>
                                            <label for="tempat_meninggal" class="input-label">Tempat Meninggal <span
                                                    class="text-red-500">*</span></label>
                                            <input type="text" id="tempat_meninggal" name="data_tambahan[tempat_meninggal]"
                                                value="{{ old('data_tambahan.tempat_meninggal') }}" class="input-field"
                                                placeholder="Rumah/RS/dll" required>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="penyebab" class="input-label">Penyebab Kematian</label>
                                        <input type="text" id="penyebab" name="data_tambahan[penyebab]"
                                            value="{{ old('data_tambahan.penyebab') }}" class="input-field"
                                            placeholder="Sakit/Kecelakaan/dll">
                                    </div>
                                @endif

                                <!-- Keterangan Tambahan -->
                                <div>
                                    <label for="keterangan" class="input-label">Keterangan Tambahan</label>
                                    <textarea id="keterangan" name="keterangan" rows="2" class="input-field"
                                        placeholder="Informasi tambahan (opsional)">{{ old('keterangan') }}</textarea>
                                </div>

                                <!-- Upload Dokumen -->
                                <div>
                                    <label class="input-label">Dokumen Pendukung</label>
                                    <div
                                        class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-primary-400 transition-colors">
                                        <input type="file" id="dokumen" name="dokumen[]" multiple
                                            accept=".pdf,.jpg,.jpeg,.png" class="hidden" onchange="updateFileList(this)">
                                        <label for="dokumen" class="cursor-pointer">
                                            <svg class="w-10 h-10 text-gray-400 mx-auto mb-2" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                            </svg>
                                            <p class="text-sm text-gray-600">Klik untuk upload atau drag & drop</p>
                                            <p class="text-xs text-gray-500 mt-1">PDF, JPG, PNG (maks. 2MB per file)</p>
                                        </label>
                                    </div>
                                    <div id="file-list" class="mt-2 space-y-1"></div>
                                </div>

                                <!-- Submit Button -->
                                <div class="flex gap-3 pt-4">
                                    <a href="{{ route('services') }}" class="btn btn-secondary flex-1 justify-center">
                                        Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary flex-1 justify-center">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Ajukan Permohonan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Right: Requirements & Info -->
                <div class="space-y-6">
                    <!-- Persyaratan -->
                    <div class="card">
                        <div class="card-body">
                            <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>
                                Persyaratan
                            </h3>
                            <ul class="space-y-2 text-sm text-gray-600">
                                @php
                                    $persyaratan = json_decode($jenisSurat->persyaratan ?? '[]', true);
                                @endphp
                                @forelse($persyaratan as $item)
                                    <li class="flex items-start gap-2">
                                        <svg class="w-4 h-4 text-primary-500 mt-0.5 flex-shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ $item }}
                                    </li>
                                @empty
                                    <li>Tidak ada persyaratan khusus</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>

                    <!-- Estimasi Waktu -->
                    <div class="card">
                        <div class="card-body">
                            <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Estimasi Proses
                            </h3>
                            <p class="text-2xl font-bold text-primary-600">{{ $jenisSurat->estimasi_hari }} hari kerja</p>
                            <p class="text-sm text-gray-500 mt-1">Setelah dokumen lengkap & diverifikasi</p>
                        </div>
                    </div>

                    <!-- Alur Pengajuan -->
                    <div class="card">
                        <div class="card-body">
                            <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                                Alur Pengajuan
                            </h3>
                            <ol class="relative border-l border-gray-200 ml-3 space-y-4">
                                <li class="ml-6">
                                    <span
                                        class="absolute flex items-center justify-center w-6 h-6 bg-primary-100 rounded-full -left-3 text-xs font-bold text-primary-700">1</span>
                                    <p class="text-sm text-gray-700">Isi form & upload dokumen</p>
                                </li>
                                <li class="ml-6">
                                    <span
                                        class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -left-3 text-xs font-bold text-gray-600">2</span>
                                    <p class="text-sm text-gray-700">Verifikasi oleh petugas</p>
                                </li>
                                <li class="ml-6">
                                    <span
                                        class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -left-3 text-xs font-bold text-gray-600">3</span>
                                    <p class="text-sm text-gray-700">Tanda tangan Kepala Desa</p>
                                </li>
                                <li class="ml-6">
                                    <span
                                        class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -left-3 text-xs font-bold text-gray-600">4</span>
                                    <p class="text-sm text-gray-700">Surat siap diambil</p>
                                </li>
                            </ol>
                        </div>
                    </div>

                    <!-- Tracking -->
                    <div class="bg-primary-50 border border-primary-200 rounded-xl p-4">
                        <p class="text-sm text-primary-800">
                            <strong>Sudah mengajukan?</strong><br>
                            Cek status pengajuan Anda di halaman
                            <a href="{{ route('tracking') }}" class="underline font-medium">Lacak Surat</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        function updateFileList(input) {
            const fileList = document.getElementById('file-list');
            fileList.innerHTML = '';

            if (input.files.length > 0) {
                Array.from(input.files).forEach(file => {
                    const div = document.createElement('div');
                    div.className = 'flex items-center gap-2 text-sm text-gray-600 bg-gray-50 px-3 py-2 rounded';
                    div.innerHTML = `
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span>${file.name}</span>
                    <span class="text-gray-400">(${(file.size / 1024).toFixed(1)} KB)</span>
                `;
                    fileList.appendChild(div);
                });
            }
        }
    </script>
@endpush