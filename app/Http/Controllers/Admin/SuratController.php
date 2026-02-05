<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSurat;
use App\Models\JenisSurat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        $query = PengajuanSurat::with(['penduduk', 'jenisSurat']);

        // Filter by status
        if ($status = $request->get('status')) {
            $query->where('status', $status);
        }

        // Search
        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nomor_pengajuan', 'like', "%{$search}%")
                    ->orWhereHas('penduduk', function ($q2) use ($search) {
                        $q2->where('nama', 'like', "%{$search}%")
                            ->orWhere('nik', 'like', "%{$search}%");
                    });
            });
        }

        $pengajuan = $query->latest()->paginate(15)->withQueryString();

        $stats = [
            'total' => PengajuanSurat::count(),
            'pending' => PengajuanSurat::pending()->count(),
            'diproses' => PengajuanSurat::whereIn('status', ['verifikasi', 'proses', 'ttd'])->count(),
            'selesai' => PengajuanSurat::where('status', 'selesai')->count(),
        ];

        return view('pages.admin.surat.index', compact('pengajuan', 'stats'));
    }

    public function show(PengajuanSurat $surat)
    {
        $surat->load(['penduduk', 'jenisSurat', 'processedBy']);
        return view('pages.admin.surat.show', compact('surat'));
    }

    // 1. Pending -> Verifikasi
    public function verify(PengajuanSurat $surat)
    {
        $surat->update([
            'status' => 'verifikasi',
            'processed_by' => auth()->id(),
            'processed_at' => now(),
        ]);

        return back()->with('success', 'Pengajuan masuk tahap verifikasi');
    }

    // 2. Verifikasi -> Proses
    public function proceed(PengajuanSurat $surat)
    {
        $surat->update([
            'status' => 'proses',
            'processed_by' => auth()->id(),
            'processed_at' => now(),
        ]);

        return back()->with('success', 'Pengajuan sedang diproses');
    }

    // 3. Proses -> TTD
    public function sign(PengajuanSurat $surat)
    {
        $surat->update([
            'status' => 'ttd',
            'processed_by' => auth()->id(),
            'processed_at' => now(),
        ]);

        return back()->with('success', 'Pengajuan menunggu tanda tangan');
    }

    // 4. TTD -> Selesai (Approve)
    public function approve(Request $request, PengajuanSurat $surat)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:100',
            'file_hasil' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('file_hasil')) {
            $filePath = $request->file('file_hasil')->store('surat-hasil', 'public');
        }

        $surat->update([
            'status' => 'selesai',
            'nomor_surat' => $request->nomor_surat,
            'catatan_admin' => $request->catatan,
            'file_hasil' => $filePath,
            'processed_by' => auth()->id(),
            'processed_at' => now(),
        ]);

        return redirect()->route('admin.surat.index')
            ->with('success', 'Surat berhasil disetujui dan diselesaikan');
    }

    public function reject(Request $request, PengajuanSurat $surat)
    {
        $request->validate([
            'alasan' => 'required|string|max:500',
        ]);

        $surat->update([
            'status' => 'ditolak',
            'catatan_admin' => $request->alasan,
            'processed_by' => auth()->id(),
            'processed_at' => now(),
        ]);

        return redirect()->route('admin.surat.index')
            ->with('success', 'Pengajuan ditolak');
    }

    public function create()
    {
        $jenisSurat = JenisSurat::active()->get();
        return view('pages.admin.surat.create', compact('jenisSurat'));
    }

    public function store(Request $request)
    {
        // For manual creation by admin
        return redirect()->route('admin.surat.index');
    }

    public function edit(PengajuanSurat $surat)
    {
        return view('pages.admin.surat.edit', compact('surat'));
    }

    public function update(Request $request, PengajuanSurat $surat)
    {
        return redirect()->route('admin.surat.index');
    }

    public function destroy(PengajuanSurat $surat)
    {
        $surat->delete();
        return redirect()->route('admin.surat.index')
            ->with('success', 'Pengajuan berhasil dihapus');
    }
}
