# Sistem Informasi & Administrasi Desa Katingan

Aplikasi berbasis web untuk digitalisasi administrasi desa, layanan publik, dan profil desa Katingan. Dikembangkan menggunakan **Laravel** dan **Tailwind CSS**.

## ✨ Fitur Utama

### 1. Dashboard Admin Desa
- **Login Multi-role**: Mendukung role Kepala Desa, Sekretaris, dan Kaur (Pemerintahan, Keuangan, Umum).
- **Statistik Penduduk**: Visualisasi data demografi (umur, pendidikan, pekerjaan).
- **Manajemen Data**: CRUD Data Penduduk dan Keluarga (Kartu Keluarga).
- **Surat Digital**: Workflow pengajuan surat dari "Verifikasi" -> "Proses" -> "Tanda Tangan" -> "Selesai" (Upload PDF).

### 2. Portal Layanan Publik (Warga)
- **Pengajuan Surat Online**: Warga dapat mengajukan surat (Domisili, Usaha, Kelahiran, dll) dari rumah.
- **Tracking Status**: Pelacakan status pengajuan real-time menggunakan kode unik (Resi).
- **Download Dokumen**: Unduh surat hasil yang sudah ditandatangani langsung dari portal.

### 3. Profil Desa
- **Informasi Publik**: Visi Misi, Sejarah, Struktur Organisasi, dan Geografis.
- **Potensi Desa**: Galeri interaktif wisata dan UMKM desa.
- **Berita & Pengumuman**: Update kegiatan desa terbaru.

## 🛠️ Teknologi yang Digunakan
- **Backend**: Laravel 11 (PHP 8.2+)
- **Frontend**: Blade Templating + Tailwind CSS
- **Database**: MySQL
- **Server**: Apache/Nginx (Local) / FrankenPHP (Production/Railway)

## 🚀 Instalasi & Menjalankan (Lokal)

### Prasyarat
- PHP 8.2 atau lebih baru
- Composer
- Node.js & NPM
- MySQL

### Langkah-langkah
1. **Clone Repository**
   ```bash
   git clone https://github.com/username/desa-katingan.git
   cd desa-katingan
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Environment**
   Salin file `.env.example` ke `.env` dan atur database.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Edit file `.env` dan sesuaikan DB_DATABASE, DB_USERNAME, DB_PASSWORD sesuai settingan MySQL lokal Anda.*

4. **Migrasi Database & Seeder**
   ```bash
   php artisan migrate --seed
   ```
   *Akun Admin Default:*
   - Email: `kades@desakatingan.id`
   - Password: `password123`

5. **Jalankan Aplikasi**
   Buka dua terminal berbeda:
   ```bash
   # Terminal 1 (Backend)
   php artisan serve

   # Terminal 2 (Frontend Build/Watch)
   npm run dev
   ```
   Akses di browser: `http://localhost:8000`

## ☁️ Deployment (Railway)
Panduan lengkap deployment ke Railway dapat dilihat di file `deployment_guide.md` atau `artifacts/deployment_guide.md`.

## 📸 Screenshots
*(Tangkapan layar dashboard, portal warga, dan fitur tracking)*

## 📄 Lisensi
[MIT License](https://opensource.org/licenses/MIT).
