@extends('layouts.admin')

@section('title', 'Manajemen Galeri')
@section('page-title', 'Galeri Desa')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold text-gray-800">Daftar Foto Galeri</h2>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Foto
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-3">Gambar</th>
                        <th class="px-6 py-3">Judul & Deskripsi</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Tanggal Upload</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($galeri as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" 
                                     class="w-20 h-14 object-cover rounded-lg shadow-sm">
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-900">{{ $item->judul }}</div>
                                <div class="text-xs text-gray-500 mt-1 line-clamp-2 max-w-xs">{{ $item->deskripsi ?? '-' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                @if($item->is_active)
                                    <span class="px-2 py-1 text-xs font-medium text-green-700 bg-green-100 rounded-full">Aktif</span>
                                @else
                                    <span class="px-2 py-1 text-xs font-medium text-gray-600 bg-gray-100 rounded-full">Non-Aktif</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-500">
                                {{ $item->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.galeri.edit', $item) }}" 
                                   class="text-blue-600 hover:text-blue-900 font-medium">Edit</a>
                                <form action="{{ route('admin.galeri.destroy', $item) }}" method="POST" class="inline-block" 
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p>Belum ada foto di galeri</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t">
            {{ $galeri->links() }}
        </div>
    </div>
@endsection