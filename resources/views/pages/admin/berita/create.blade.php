@extends('layouts.admin')

@section('title', 'Tulis Berita')
@section('page-title', 'Tulis Berita')

@section('content')
    <div class="max-w-3xl">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.berita.index') }}" class="p-2 hover:bg-gray-100 rounded-lg">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-xl font-bold text-gray-900">Tulis Berita Baru</h1>
        </div>

        <form action="{{ route('admin.berita.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="card">
                <div class="card-body space-y-4">
                    <div>
                        <label class="input-label">Judul Berita <span class="text-red-500">*</span></label>
                        <input type="text" name="judul" value="{{ old('judul') }}"
                            class="input-field @error('judul') border-red-500 @enderror" required>
                        @error('judul')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="input-label">Kategori <span class="text-red-500">*</span></label>
                            <select name="kategori" class="input-field" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Pengumuman" {{ old('kategori') == 'Pengumuman' ? 'selected' : '' }}>Pengumuman
                                </option>
                                <option value="Kegiatan" {{ old('kategori') == 'Kegiatan' ? 'selected' : '' }}>Kegiatan
                                </option>
                                <option value="Pembangunan" {{ old('kategori') == 'Pembangunan' ? 'selected' : '' }}>
                                    Pembangunan</option>
                                <option value="Kesehatan" {{ old('kategori') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan
                                </option>
                                <option value="Pendidikan" {{ old('kategori') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan
                                </option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }} class="w-4 h-4 text-primary-600 rounded border-gray-300">
                                <span class="text-sm text-gray-700">Publikasikan langsung</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="input-label">Ringkasan <span class="text-red-500">*</span></label>
                        <textarea name="ringkasan" rows="2" class="input-field" maxlength="500"
                            required>{{ old('ringkasan') }}</textarea>
                        <p class="text-xs text-gray-400 mt-1">Maks. 500 karakter</p>
                    </div>

                    <div>
                        <label class="input-label">Konten <span class="text-red-500">*</span></label>
                        <textarea name="konten" rows="10" class="input-field" required>{{ old('konten') }}</textarea>
                        <p class="text-xs text-gray-400 mt-1">Mendukung format HTML</p>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit" class="btn btn-primary">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Berita
                </button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection