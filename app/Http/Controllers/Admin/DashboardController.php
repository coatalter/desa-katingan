<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_penduduk' => Penduduk::aktif()->count(),
            'penduduk_laki' => Penduduk::aktif()->where('jenis_kelamin', 'L')->count(),
            'penduduk_perempuan' => Penduduk::aktif()->where('jenis_kelamin', 'P')->count(),
            'total_kk' => Penduduk::aktif()->where('is_kepala_keluarga', true)->count(),
            'surat_pending' => PengajuanSurat::pending()->count(),
            'surat_bulan_ini' => PengajuanSurat::whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count(),
        ];

        // Demographic Stats for Charts
        $demographics = [
            'gender' => [
                'labels' => ['Laki-laki', 'Perempuan'],
                'data' => [$stats['penduduk_laki'], $stats['penduduk_perempuan']]
            ],
            'age_groups' => [
                'labels' => ['Anak (0-12)', 'Remaja (13-18)', 'Dewasa (19-59)', 'Lansia (60+)'],
                'data' => [
                    Penduduk::aktif()->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) <= 12')->count(),
                    Penduduk::aktif()->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 13 AND 18')->count(),
                    Penduduk::aktif()->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 19 AND 59')->count(),
                    Penduduk::aktif()->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 60')->count(),
                ]
            ],
            'education' => [
                'labels' => Penduduk::aktif()->whereNotNull('pendidikan')->groupBy('pendidikan')->pluck('pendidikan')->toArray(),
                'data' => Penduduk::aktif()->whereNotNull('pendidikan')->groupBy('pendidikan')->selectRaw('count(*) as count')->pluck('count')->toArray()
            ]
        ];

        $recentSurat = PengajuanSurat::with(['penduduk', 'jenisSurat'])
            ->latest()
            ->take(5)
            ->get();

        return view('pages.admin.dashboard', compact('stats', 'recentSurat', 'demographics'));
    }
}
