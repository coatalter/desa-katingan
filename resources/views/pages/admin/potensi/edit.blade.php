@extends('layouts.admin')

@section('title', 'Edit Potensi')
@section('page-title', 'Edit Potensi')

@section('content')
    <div class="max-w-3xl">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.potensi.index') }}" class="p-2 hover:bg-gray-100 rounded-lg">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-xl font-bold text-gray-900">Edit Potensi Desa</h1>
        </div>

        <form action="{{ route('admin.potensi.update', $potensi) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-body space-y-4">
                    <div>
                        <label class="input-label">Nama Potensi <span class="text-red-500">*</span></label>
                        <input type="text" name="nama" value="{{ old('nama', $potensi->nama) }}" class="input-field"
                            required>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="input-label">Kategori <span class="text-red-500">*</span></label>
                            <select name="kategori" class="input-field" required>
                                @foreach(['Kuliner', 'Kerajinan', 'Wisata', 'Pertanian', 'Peternakan', 'Perdagangan'] as $kat)
                                    <option value="{{ $kat }}" {{ old('kategori', $potensi->kategori) == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-end">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $potensi->is_active) ? 'checked' : '' }} class="w-4 h-4 text-primary-600 rounded border-gray-300">
                                <span class="text-sm text-gray-700">Aktif</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="input-label">Deskripsi <span class="text-red-500">*</span></label>
                        <textarea name="deskripsi" rows="4" class="input-field"
                            required>{{ old('deskripsi', $potensi->deskripsi) }}</textarea>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="input-label">Nama Pemilik/Pengelola</label>
                            <input type="text" name="pemilik" value="{{ old('pemilik', $potensi->pemilik) }}"
                                class="input-field">
                        </div>
                        <div>
                            <label class="input-label">Kontak (HP/WA)</label>
                            <input type="text" name="kontak" value="{{ old('kontak', $potensi->kontak) }}"
                                class="input-field">
                        </div>
                    </div>

                    <div>
                        <label class="input-label">Alamat</label>
                        <textarea name="alamat" rows="2"
                            class="input-field">{{ old('alamat', $potensi->alamat) }}</textarea>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="input-label">Latitude</label>
                            <input type="number" step="any" name="latitude"
                                value="{{ old('latitude', $potensi->latitude) }}" class="input-field">
                        </div>
                        <div>
                            <label class="input-label">Longitude</label>
                            <input type="number" step="any" name="longitude"
                                value="{{ old('longitude', $potensi->longitude) }}" class="input-field">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('admin.potensi.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection