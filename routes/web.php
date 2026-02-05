<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PendudukController as AdminPendudukController;
use App\Http\Controllers\Admin\SuratController as AdminSuratController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\PotensiController as AdminPotensiController;

/*
|--------------------------------------------------------------------------
| Public Routes - Portal Warga (No Login Required)
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', [PublicController::class, 'home'])->name('home');

// Profile Desa
Route::prefix('profil')->name('profile.')->group(function () {
    Route::get('/sejarah', [PublicController::class, 'history'])->name('history');
    Route::get('/visi-misi', [PublicController::class, 'vision'])->name('vision');
    Route::get('/struktur-organisasi', [PublicController::class, 'structure'])->name('structure');
    Route::get('/geografi', [PublicController::class, 'geography'])->name('geography');
});

// Layanan Surat (Public - viewable without login)
Route::get('/layanan', [PublicController::class, 'services'])->name('services');
Route::get('/layanan/{slug}', [PublicController::class, 'serviceDetail'])->name('services.detail');

// Public Surat Submission (No login required)
Route::post('/layanan/{slug}/ajukan', [PublicController::class, 'submitRequest'])->name('services.submit');

// Potensi Desa
Route::get('/potensi', [PublicController::class, 'potentials'])->name('potentials');
Route::get('/potensi/{slug}', [PublicController::class, 'potentialDetail'])->name('potentials.detail');

// Statistik
Route::get('/statistik', [PublicController::class, 'statistics'])->name('statistics');

// Berita & Galeri
Route::get('/berita', [PublicController::class, 'news'])->name('news');
Route::get('/berita/{slug}', [PublicController::class, 'newsDetail'])->name('news.detail');
Route::get('/galeri', [PublicController::class, 'gallery'])->name('gallery');

// Tracking Surat (Public - No login required)
Route::get('/lacak', [PublicController::class, 'tracking'])->name('tracking');
Route::post('/lacak', [PublicController::class, 'trackingSearch'])->name('tracking.search');

// Verifikasi QR Code
Route::get('/verifikasi/{token}', [PublicController::class, 'verifyDocument'])->name('verify');

/*
|--------------------------------------------------------------------------
| Admin Panel Routes (Concealed - Staff Only)
|--------------------------------------------------------------------------
| Route prefix: /panel-desa (hidden from public)
*/

// Admin Login (separate from public)
Route::prefix('panel-desa')->name('admin.')->group(function () {
    // Admin Auth
    Route::middleware('guest')->group(function () {
        Route::get('/masuk', [AuthController::class, 'showAdminLogin'])->name('login');
        Route::post('/masuk', [AuthController::class, 'adminLogin'])->name('login.post');
    });

    Route::post('/keluar', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});

// Admin Dashboard (Protected)
Route::middleware(['auth', 'admin'])->prefix('panel-desa')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Master Data Penduduk & Keluarga (Staff only)
    Route::middleware('role:admin,kepala_desa,sekretaris,kaur_pemerintahan')->group(function () {
        Route::resource('penduduk', AdminPendudukController::class);
        Route::get('/keluarga', fn() => view('pages.admin.keluarga.index'))->name('keluarga.index');
    });

    // Surat Management
    Route::get('surat', [AdminSuratController::class, 'index'])->name('surat.index');
    Route::get('surat/create', [AdminSuratController::class, 'create'])->name('surat.create');
    Route::post('surat', [AdminSuratController::class, 'store'])->name('surat.store');
    Route::get('surat/{surat}/edit', [AdminSuratController::class, 'edit'])->name('surat.edit');
    Route::put('surat/{surat}', [AdminSuratController::class, 'update'])->name('surat.update');
    Route::get('surat/{surat}', [AdminSuratController::class, 'show'])->name('surat.show');
    Route::post('surat/{surat}/verify', [AdminSuratController::class, 'verify'])->name('surat.verify');
    Route::post('surat/{surat}/proceed', [AdminSuratController::class, 'proceed'])->name('surat.proceed');
    Route::post('surat/{surat}/sign', [AdminSuratController::class, 'sign'])->name('surat.sign');
    Route::post('surat/{surat}/approve', [AdminSuratController::class, 'approve'])->name('surat.approve');
    Route::post('surat/{surat}/reject', [AdminSuratController::class, 'reject'])->name('surat.reject');
    Route::delete('surat/{surat}', [AdminSuratController::class, 'destroy'])->name('surat.destroy');

    // Jenis Surat (Admin/Sekretaris only)
    Route::get('/jenis-surat', fn() => view('pages.admin.jenis-surat.index'))->name('jenis-surat.index')
        ->middleware('role:admin,sekretaris');

    // Berita
    Route::resource('berita', AdminBeritaController::class);

    // Potensi Desa
    Route::resource('potensi', AdminPotensiController::class);

    // Galeri
    Route::resource('galeri', App\Http\Controllers\Admin\GaleriController::class);

    // User Management (Kepala Desa/Admin only)
    Route::resource('users', App\Http\Controllers\Admin\UserController::class)
        ->middleware('role:admin,kepala_desa');
});

/*
|--------------------------------------------------------------------------
| Legacy Routes (Redirect old paths)
|--------------------------------------------------------------------------
*/

// Redirect old /admin to /panel-desa
Route::get('/admin', fn() => redirect()->route('admin.login'));
Route::get('/admin/{any}', fn() => redirect()->route('admin.login'))->where('any', '.*');

// Redirect old /masuk to home (public doesn't need login anymore)
Route::get('/masuk', fn() => redirect()->route('services'));
Route::get('/daftar', fn() => redirect()->route('services'));
