@extends('layouts.admin')

@section('title', 'Edit Penduduk')
@section('page-title', 'Edit Penduduk')

@section('content')
    <div class="max-w-4xl">
        <!-- Header -->
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.penduduk.index') }}" class="p-2 hover:bg-gray-100 rounded-lg">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div>
                <h1 class="text-xl font-bold text-gray-900">Edit Data Penduduk</h1>
                <p class="text-sm text-gray-500">{{ $penduduk->nama }} - {{ $penduduk->nik }}</p>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.penduduk.update', $penduduk) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Data Identitas -->
            <div class="card">
                <div class="px-5 py-3 border-b border-gray-200 bg-gray-50">
                    <h2 class="font-semibold text-gray-800">Data Identitas</h2>
                </div>
                <div class="card-body grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="input-label">NIK <span class="text-red-500">*</span></label>
                        <input type="text" name="nik" value="{{ old('nik', $penduduk->nik) }}" maxlength="16"
                            class="input-field @error('nik') border-red-500 @enderror" required>
                        @error('nik')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="input-label">No. KK</label>
                        <input type="text" name="no_kk" value="{{ old('no_kk', $penduduk->no_kk) }}" maxlength="16"
                            class="input-field">
                    </div>
                    <div class="md:col-span-2">
                        <label class="input-label">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="nama" value="{{ old('nama', $penduduk->nama) }}"
                            class="input-field @error('nama') border-red-500 @enderror" required>
                    </div>
                    <div>
                        <label class="input-label">Jenis Kelamin <span class="text-red-500">*</span></label>
                        <select name="jenis_kelamin" class="input-field" required>
                            <option value="L" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Tempat Lahir <span class="text-red-500">*</span></label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $penduduk->tempat_lahir) }}"
                            class="input-field" required>
                    </div>
                    <div>
                        <label class="input-label">Tanggal Lahir <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir?->format('Y-m-d')) }}"
                            class="input-field" required>
                    </div>
                    <div>
                        <label class="input-label">Agama <span class="text-red-500">*</span></label>
                        <select name="agama" class="input-field" required>
                            @foreach(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'] as $agama)
                                <option value="{{ $agama }}" {{ old('agama', $penduduk->agama) == $agama ? 'selected' : '' }}>
                                    {{ $agama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Status Perkawinan <span class="text-red-500">*</span></label>
                        <select name="status_perkawinan" class="input-field" required>
                            @foreach(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'] as $status)
                                <option value="{{ $status }}" {{ old('status_perkawinan', $penduduk->status_perkawinan) == $status ? 'selected' : '' }}>{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="input-label">Pekerjaan</label>
                        <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $penduduk->pekerjaan) }}"
                            class="input-field">
                    </div>
                    <div>
                        <label class="input-label">Pendidikan Terakhir</label>
                        <select name="pendidikan" class="input-field">
                            <option value="">Pilih</option>
                            @foreach(['Tidak/Belum Sekolah', 'SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3'] as $pend)
                                <option value="{{ $pend }}" {{ old('pendidikan', $penduduk->pendidikan) == $pend ? 'selected' : '' }}>{{ $pend }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Alamat -->
            <div class="card">
                <div class="px-5 py-3 border-b border-gray-200 bg-gray-50">
                    <h2 class="font-semibold text-gray-800">Alamat</h2>
                </div>
                <div class="card-body grid md:grid-cols-3 gap-4">
                    <div class="md:col-span-3">
                        <label class="input-label">Alamat <span class="text-red-500">*</span></label>
                        <textarea name="alamat" rows="2" class="input-field"
                            required>{{ old('alamat', $penduduk->alamat) }}</textarea>
                    </div>
                    <div>
                        <label class="input-label">RT</label>
                        <input type="text" name="rt" value="{{ old('rt', $penduduk->rt) }}" maxlength="3"
                            class="input-field">
                    </div>
                    <div>
                        <label class="input-label">RW</label>
                        <input type="text" name="rw" value="{{ old('rw', $penduduk->rw) }}" maxlength="3"
                            class="input-field">
                    </div>
                    <div>
                        <label class="input-label">Dusun</label>
                        <input type="text" name="dusun" value="{{ old('dusun', $penduduk->dusun) }}" class="input-field">
                    </div>
                    <div>
                        <label class="input-label">Status Penduduk <span class="text-red-500">*</span></label>
                        <select name="status_penduduk" class="input-field" required>
                            @foreach(['Tetap', 'Sementara', 'Pindah', 'Meninggal'] as $status)
                                <option value="{{ $status }}" {{ old('status_penduduk', $penduduk->status_penduduk) == $status ? 'selected' : '' }}>{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md:col-span-2 flex items-end">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_kepala_keluarga" value="1" {{ old('is_kepala_keluarga', $penduduk->is_kepala_keluarga) ? 'checked' : '' }}
                                class="w-4 h-4 text-primary-600 rounded border-gray-300">
                            <span class="text-sm text-gray-700">Kepala Keluarga</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-3">
                <button type="submit" class="btn btn-primary">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.penduduk.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection