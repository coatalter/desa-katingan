<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WargaController extends Controller
{
    /**
     * Dashboard Warga
     */
    public function dashboard()
    {
        $user = Auth::user();

        // TODO: Get actual data from database
        $stats = [
            'pending' => 2,
            'completed' => 5,
        ];

        $recentRequests = [];

        return view('pages.warga.dashboard', compact('user', 'stats', 'recentRequests'));
    }

    /**
     * Profile Page
     */
    public function profile()
    {
        $user = Auth::user();
        return view('pages.warga.profile', compact('user'));
    }

    /**
     * Update Profile
     */
    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'email' => 'nullable|email',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string|max:500',
        ]);

        // TODO: Update user profile
        // Auth::user()->update($validated);

        return back()->with('success', 'Profil berhasil diperbarui');
    }

    /**
     * List All Requests
     */
    public function requests()
    {
        $user = Auth::user();

        // TODO: Get actual requests from database
        $requests = [];

        return view('pages.warga.requests.index', compact('requests'));
    }

    /**
     * Create New Request Form
     */
    public function createRequest($jenis)
    {
        $user = Auth::user();

        // Map jenis to readable name
        $jenisMap = [
            'domisili' => 'Surat Keterangan Domisili',
            'usaha' => 'Surat Keterangan Usaha',
            'skck' => 'Surat Pengantar SKCK',
            'tidak-mampu' => 'Surat Keterangan Tidak Mampu',
            'kelahiran' => 'Surat Keterangan Kelahiran',
            'kematian' => 'Surat Keterangan Kematian',
        ];

        if (!isset($jenisMap[$jenis])) {
            abort(404, 'Jenis surat tidak ditemukan');
        }

        $namaJenis = $jenisMap[$jenis];

        return view('pages.warga.requests.create', compact('user', 'jenis', 'namaJenis'));
    }

    /**
     * Store New Request
     */
    public function storeRequest(Request $request)
    {
        $validated = $request->validate([
            'jenis_surat' => 'required|string',
            'keperluan' => 'required|string|max:500',
            'dokumen.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ], [
            'jenis_surat.required' => 'Jenis surat wajib diisi',
            'keperluan.required' => 'Keperluan wajib diisi',
            'dokumen.*.mimes' => 'Format file harus JPG, PNG, atau PDF',
            'dokumen.*.max' => 'Ukuran file maksimal 2MB',
        ]);

        // TODO: Create request and upload documents
        // $suratRequest = SuratRequest::create([...]);

        return redirect()->route('warga.requests')->with('success', 'Pengajuan surat berhasil dikirim');
    }

    /**
     * Show Request Detail
     */
    public function showRequest($id)
    {
        // TODO: Get actual request from database
        $request = null;

        return view('pages.warga.requests.show', compact('request'));
    }

    /**
     * Download Request Document
     */
    public function downloadRequest($id)
    {
        // TODO: Get actual document and return download
        abort(404, 'Dokumen tidak ditemukan');
    }
}
