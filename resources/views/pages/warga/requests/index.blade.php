@extends('layouts.warga')

@section('title', 'Pengajuan Surat')
@section('page-title', 'Daftar Pengajuan Surat')
@section('page-subtitle', 'Kelola pengajuan surat Anda')

@section('content')
    <!-- Header Actions -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <div class="flex items-center gap-3">
            <select class="input-field py-2 text-sm">
                <option value="">Semua Status</option>
                <option value="pending">Pending</option>
                <option value="process">Diproses</option>
                <option value="done">Selesai</option>
                <option value="rejected">Ditolak</option>
            </select>
            <div class="relative">
                <input type="text" placeholder="Cari pengajuan..." class="input-field py-2 pl-10 text-sm w-64">
                <svg class="w-4 h-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

        <a href="{{ route('services') }}" class="btn btn-primary">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Buat Pengajuan Baru
        </a>
    </div>

    <!-- Requests Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">No. Pengajuan</th>
                        <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Jenis Surat</th>
                        <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Tanggal</th>
                        <th class="text-left px-6 py-4 text-sm font-semibold text-gray-600">Status</th>
                        <th class="text-right px-6 py-4 text-sm font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <!-- Row 1 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <span class="font-mono text-sm font-medium text-gray-900">REQ-2026-00145</span>
                        </td>
                        <td class="px-6 py-4">
                            <div>
                                <p class="font-medium text-gray-900">Surat Keterangan Domisili</p>
                                <p class="text-sm text-gray-500">Keperluan: Melamar kerja</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">1 Feb 2026</td>
                        <td class="px-6 py-4">
                            <span class="badge badge-warning">
                                <span class="status-dot status-dot-warning"></span>
                                Pending
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="text-primary-600 hover:text-primary-700 text-sm font-medium">Detail</a>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <span class="font-mono text-sm font-medium text-gray-900">REQ-2026-00142</span>
                        </td>
                        <td class="px-6 py-4">
                            <div>
                                <p class="font-medium text-gray-900">Surat Pengantar SKCK</p>
                                <p class="text-sm text-gray-500">Keperluan: Persyaratan kerja</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">28 Jan 2026</td>
                        <td class="px-6 py-4">
                            <span class="badge badge-process">
                                <span class="status-dot status-dot-process"></span>
                                Diproses
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="text-primary-600 hover:text-primary-700 text-sm font-medium">Detail</a>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <span class="font-mono text-sm font-medium text-gray-900">REQ-2026-00138</span>
                        </td>
                        <td class="px-6 py-4">
                            <div>
                                <p class="font-medium text-gray-900">Surat Keterangan Usaha</p>
                                <p class="text-sm text-gray-500">Keperluan: Pengajuan pinjaman</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">25 Jan 2026</td>
                        <td class="px-6 py-4">
                            <span class="badge badge-success">
                                <span class="status-dot status-dot-success"></span>
                                Selesai
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="#" class="text-primary-600 hover:text-primary-700 text-sm font-medium">Detail</a>
                                <span class="text-gray-300">|</span>
                                <a href="#" class="text-green-600 hover:text-green-700 text-sm font-medium">Download</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
            <p class="text-sm text-gray-500">Menampilkan 1-3 dari 8 pengajuan</p>
            <div class="flex items-center gap-2">
                <button class="btn btn-ghost btn-sm" disabled>Sebelumnya</button>
                <button class="btn btn-primary btn-sm">1</button>
                <button class="btn btn-ghost btn-sm">2</button>
                <button class="btn btn-ghost btn-sm">3</button>
                <button class="btn btn-ghost btn-sm">Selanjutnya</button>
            </div>
        </div>
    </div>
@endsection