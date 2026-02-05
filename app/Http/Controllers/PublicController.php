<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\PengajuanSurat;
use App\Models\JenisSurat;
use App\Models\Potensi;
use App\Models\Berita;
use App\Models\Galeri;
use Illuminate\Support\Str;

class PublicController extends Controller
{
    /**
     * Landing Page
     */
    public function home()
    {
        return view('pages.public.home');
    }

    /**
     * Profil Desa - Sejarah
     */
    public function history()
    {
        return view('pages.public.profile.history');
    }

    /**
     * Profil Desa - Visi Misi
     */
    public function vision()
    {
        return view('pages.public.profile.vision');
    }

    /**
     * Profil Desa - Struktur Organisasi
     */
    public function structure()
    {
        return view('pages.public.profile.structure');
    }

    /**
     * Layanan Surat - List all services
     */
    public function services()
    {
        $jenisSurats = JenisSurat::where('is_active', true)->get();
        return view('pages.public.services.index', compact('jenisSurats'));
    }

    /**
     * Detail Layanan - Show service detail & submission form
     */
    public function serviceDetail($slug)
    {
        $jenisSurat = JenisSurat::where('slug', $slug)->firstOrFail();
        return view('pages.public.services.detail', compact('jenisSurat'));
    }

    /**
     * Submit Surat Request (Public - No Login Required)
     * Validates NIK against Penduduk database
     */
    public function submitRequest(Request $request, $slug)
    {
        $jenisSurat = JenisSurat::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'nik' => 'required|string|size:16',
            'keperluan' => 'required|string|max:500',
            'keterangan' => 'nullable|string|max:1000',
            'data_tambahan' => 'nullable|array',
            'data_tambahan.*' => 'nullable|string|max:500',
            'dokumen' => 'nullable|array|max:5',
            'dokumen.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'nik.required' => 'NIK wajib diisi',
            'nik.size' => 'NIK harus 16 digit',
            'keperluan.required' => 'Keperluan wajib diisi',
            'dokumen.*.max' => 'Ukuran file maksimal 2MB',
            'dokumen.*.mimes' => 'Format file harus PDF, JPG, atau PNG',
        ]);

        // Validate NIK against Penduduk database
        $penduduk = Penduduk::where('nik', $validated['nik'])->first();

        if (!$penduduk) {
            return back()->withErrors([
                'nik' => 'NIK tidak terdaftar di database desa. Silakan hubungi kantor desa untuk pendaftaran.'
            ])->withInput();
        }

        // Handle file uploads
        $uploadedFiles = [];
        if ($request->hasFile('dokumen')) {
            foreach ($request->file('dokumen') as $file) {
                $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('dokumen-pengajuan', $filename, 'public');
                $uploadedFiles[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => 'dokumen-pengajuan/' . $filename,
                    'size' => $file->getSize(),
                ];
            }
        }

        // Generate unique tracking code
        $trackingCode = strtoupper(Str::random(4) . '-' . date('ymd') . '-' . Str::random(4));

        // Create pengajuan
        $pengajuan = PengajuanSurat::create([
            'jenis_surat_id' => $jenisSurat->id,
            'penduduk_id' => $penduduk->id,
            'user_id' => null, // No user since public submission
            'keperluan' => $validated['keperluan'],
            'keterangan' => $validated['keterangan'] ?? null,
            'data_tambahan' => $validated['data_tambahan'] ?? null,
            'dokumen_pendukung' => !empty($uploadedFiles) ? $uploadedFiles : null,
            'status' => 'pending',
            'nomor_pengajuan' => $trackingCode,
        ]);

        return redirect()->route('services.detail', $slug)
            ->with('success', 'Pengajuan berhasil disubmit! Simpan kode tracking Anda.')
            ->with('tracking_code', $trackingCode);
    }

    /**
     * Potensi Desa
     */
    public function potentials()
    {
        $potentials = Potensi::active()->get();
        return view('pages.public.potentials.index', compact('potentials'));
    }

    /**
     * Detail Potensi
     */
    public function potentialDetail($slug)
    {
        return view('pages.public.potentials.detail', compact('slug'));
    }

    /**
     * Statistik
     */
    public function statistics()
    {
        $stats = [
            'total_penduduk' => Penduduk::aktif()->count(),
            'penduduk_laki' => Penduduk::aktif()->where('jenis_kelamin', 'L')->count(),
            'penduduk_perempuan' => Penduduk::aktif()->where('jenis_kelamin', 'P')->count(),
            'total_kk' => Penduduk::aktif()->where('is_kepala_keluarga', true)->count(),
        ];

        $demographics = [
            'age_groups' => [
                'labels' => ['0-12 (Anak)', '13-18 (Remaja)', '19-59 (Dewasa)', '60+ (Lansia)'],
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
            ],
            'religion' => [
                'labels' => Penduduk::aktif()->whereNotNull('agama')->groupBy('agama')->pluck('agama')->toArray(),
                'data' => Penduduk::aktif()->whereNotNull('agama')->groupBy('agama')->selectRaw('count(*) as count')->pluck('count')->toArray()
            ]
        ];

        return view('pages.public.statistics', compact('stats', 'demographics'));
    }

    /**
     * Geografi
     */
    public function geography()
    {
        return view('pages.public.profile.geography');
    }

    /**
     * Berita
     */
    public function news()
    {
        $news = Berita::published()->latest()->get();
        return view('pages.public.news.index', compact('news'));
    }

    /**
     * Detail Berita
     */
    public function newsDetail($slug)
    {
        return view('pages.public.news.detail', compact('slug'));
    }

    /**
     * Galeri
     */
    public function gallery()
    {
        $gallery = Galeri::active()->latest()->paginate(9);
        return view('pages.public.gallery', compact('gallery'));
    }

    /**
     * Tracking Surat - Form page
     */
    public function tracking()
    {
        return view('pages.public.tracking');
    }

    /**
     * Search Tracking by NIK + Nomor Pengajuan
     */
    public function trackingSearch(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|size:16',
            'nomor_pengajuan' => 'required|string'
        ], [
            'nik.required' => 'NIK wajib diisi',
            'nik.size' => 'NIK harus 16 digit',
            'nomor_pengajuan.required' => 'Nomor pengajuan wajib diisi',
        ]);

        // Find the pengajuan
        $pengajuan = PengajuanSurat::whereHas('penduduk', function ($q) use ($request) {
            $q->where('nik', $request->nik);
        })
            ->where('nomor_pengajuan', strtoupper($request->nomor_pengajuan))
            ->with(['jenisSurat', 'penduduk', 'processedBy'])
            ->first();

        if (!$pengajuan) {
            return back()->withErrors([
                'not_found' => 'Data pengajuan tidak ditemukan. Pastikan NIK dan nomor pengajuan sudah benar.'
            ])->withInput();
        }

        return view('pages.public.tracking', compact('pengajuan'));
    }

    /**
     * Verify Document via QR Code
     */
    public function verifyDocument($token)
    {
        // TODO: Implement document verification
        $document = null;

        return view('pages.public.verify', compact('token', 'document'));
    }
}
