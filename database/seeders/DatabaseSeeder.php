<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Penduduk;
use App\Models\JenisSurat;
use App\Models\Berita;
use App\Models\Potensi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Kepala Desa
        User::create([
            'name' => 'H. Ahmad Sulaiman',
            'email' => 'kades@desakatingan.id',
            'password' => Hash::make('password123'),
            'nik' => '6201010101000001',
            'no_hp' => '081234567890',
            'role' => 'kepala_desa',
            'is_active' => true,
        ]);

        // Create Sekretaris Desa
        User::create([
            'name' => 'Hj. Siti Aminah',
            'email' => 'sekdes@desakatingan.id',
            'password' => Hash::make('password123'),
            'nik' => '6201010101000002',
            'no_hp' => '081234567891',
            'role' => 'sekretaris',
            'is_active' => true,
        ]);

        // Create Kaur Pemerintahan
        User::create([
            'name' => 'Bambang Wijaya',
            'email' => 'kaur.pemerintahan@desakatingan.id',
            'password' => Hash::make('password123'),
            'nik' => '6201010101000003',
            'no_hp' => '081234567892',
            'role' => 'kaur_pemerintahan',
            'is_active' => true,
        ]);

        // Create Kaur Keuangan
        User::create([
            'name' => 'Dewi Lestari',
            'email' => 'kaur.keuangan@desakatingan.id',
            'password' => Hash::make('password123'),
            'nik' => '6201010101000004',
            'no_hp' => '081234567893',
            'role' => 'kaur_keuangan',
            'is_active' => true,
        ]);

        // Create Kaur Umum
        User::create([
            'name' => 'Rudi Hartono',
            'email' => 'kaur.umum@desakatingan.id',
            'password' => Hash::make('password123'),
            'nik' => '6201010101000005',
            'no_hp' => '081234567894',
            'role' => 'kaur_umum',
            'is_active' => true,
        ]);

        // Create Sample Warga User
        $wargaUser = User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@email.com',
            'password' => Hash::make('password123'),
            'nik' => '6201010115010001',
            'no_hp' => '081234567895',
            'role' => 'warga',
            'is_active' => true,
        ]);

        // Create Penduduk data
        $pendudukData = [
            [
                'nik' => '6201010115010001',
                'no_kk' => '6201010101000001',
                'nama' => 'Budi Santoso',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Katingan',
                'tanggal_lahir' => '1990-01-15',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Wiraswasta',
                'pendidikan' => 'SMA',
                'alamat' => 'Jl. Desa Katingan',
                'rt' => '02',
                'rw' => '01',
                'dusun' => 'Dusun Satu',
                'status_penduduk' => 'Tetap',
                'is_kepala_keluarga' => true,
            ],
            [
                'nik' => '6201010215010002',
                'no_kk' => '6201010101000001',
                'nama' => 'Sri Wahyuni',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Katingan',
                'tanggal_lahir' => '1992-03-20',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Ibu Rumah Tangga',
                'pendidikan' => 'SMA',
                'alamat' => 'Jl. Desa Katingan',
                'rt' => '02',
                'rw' => '01',
                'dusun' => 'Dusun Satu',
                'status_penduduk' => 'Tetap',
                'is_kepala_keluarga' => false,
            ],
            [
                'nik' => '6201010315100003',
                'no_kk' => '6201010101000001',
                'nama' => 'Andi Pratama',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Katingan',
                'tanggal_lahir' => '2010-07-10',
                'agama' => 'Islam',
                'status_perkawinan' => 'Belum Kawin',
                'pekerjaan' => 'Pelajar',
                'pendidikan' => 'SD',
                'alamat' => 'Jl. Desa Katingan',
                'rt' => '02',
                'rw' => '01',
                'dusun' => 'Dusun Satu',
                'status_penduduk' => 'Tetap',
                'is_kepala_keluarga' => false,
            ],
            [
                'nik' => '6201010188050004',
                'no_kk' => '6201010101000002',
                'nama' => 'Pak Joko Widodo',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Palangkaraya',
                'tanggal_lahir' => '1988-05-12',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Petani',
                'pendidikan' => 'SMP',
                'alamat' => 'Jl. Kampung Baru',
                'rt' => '01',
                'rw' => '02',
                'dusun' => 'Dusun Dua',
                'status_penduduk' => 'Tetap',
                'is_kepala_keluarga' => true,
            ],
            [
                'nik' => '6201010290060005',
                'no_kk' => '6201010101000002',
                'nama' => 'Bu Siti Rahayu',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Katingan',
                'tanggal_lahir' => '1990-06-25',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
                'pekerjaan' => 'Ibu Rumah Tangga',
                'pendidikan' => 'SMP',
                'alamat' => 'Jl. Kampung Baru',
                'rt' => '01',
                'rw' => '02',
                'dusun' => 'Dusun Dua',
                'status_penduduk' => 'Tetap',
                'is_kepala_keluarga' => false,
            ],
        ];

        foreach ($pendudukData as $data) {
            Penduduk::create($data);
        }

        // Create Jenis Surat
        $this->call(JenisSuratSeeder::class);

        // Create Sample Berita
        Berita::create([
            'judul' => 'Musyawarah Desa: Rencana Pembangunan 2026',
            'slug' => 'musyawarah-desa-rencana-pembangunan-2026',
            'ringkasan' => 'Kepala desa bersama perangkat desa mengadakan musyawarah untuk membahas rencana pembangunan tahun 2026.',
            'konten' => '<p>Pada hari Senin tanggal 1 Februari 2026, telah dilaksanakan Musyawarah Desa yang dihadiri oleh seluruh perangkat desa, tokoh masyarakat, dan perwakilan warga dari setiap dusun.</p><p>Dalam musyawarah tersebut, dibahas beberapa agenda penting terkait pembangunan desa tahun 2026, di antaranya pembangunan jalan desa, renovasi balai desa, dan program peningkatan kesejahteraan warga.</p>',
            'kategori' => 'Kegiatan',
            'author_id' => 1,
            'is_published' => true,
            'published_at' => now(),
        ]);

        Berita::create([
            'judul' => 'Jadwal Pelayanan Administrasi Bulan Februari',
            'slug' => 'jadwal-pelayanan-administrasi-februari-2026',
            'ringkasan' => 'Informasi jadwal pelayanan administrasi desa selama bulan Februari 2026.',
            'konten' => '<p>Berikut jadwal pelayanan administrasi desa selama bulan Februari 2026:</p><ul><li>Senin - Kamis: 08.00 - 15.00 WIB</li><li>Jumat: 08.00 - 11.00 WIB</li></ul><p>Untuk pelayanan darurat, warga dapat menghubungi nomor WhatsApp desa.</p>',
            'kategori' => 'Pengumuman',
            'author_id' => 1,
            'is_published' => true,
            'published_at' => now()->subDays(2),
        ]);

        Berita::create([
            'judul' => 'Posyandu Balita Dilaksanakan Tiap Minggu Ke-2',
            'slug' => 'posyandu-balita-minggu-kedua',
            'ringkasan' => 'Kegiatan posyandu balita rutin dilaksanakan setiap minggu kedua di Balai Desa.',
            'konten' => '<p>Posyandu balita desa Katingan rutin diselenggarakan setiap minggu kedua setiap bulannya. Kegiatan ini meliputi penimbangan berat badan, pengukuran tinggi badan, pemberian vitamin, dan imunisasi.</p>',
            'kategori' => 'Kegiatan',
            'author_id' => 2,
            'is_published' => true,
            'published_at' => now()->subDays(5),
        ]);

        // Create Sample Potensi
        Potensi::create([
            'nama' => 'Warung Makan Bu Ani',
            'slug' => 'warung-makan-bu-ani',
            'deskripsi' => 'Warung makan dengan menu masakan rumahan khas Kalimantan. Buka setiap hari dari jam 07.00 - 21.00.',
            'kategori' => 'Kuliner',
            'alamat' => 'Jl. Desa Katingan RT 01/RW 01',
            'pemilik' => 'Ani Supriyanti',
            'kontak' => '081234567893',
            'is_active' => true,
        ]);

        Potensi::create([
            'nama' => 'Kerajinan Rotan Pak Eko',
            'slug' => 'kerajinan-rotan-pak-eko',
            'deskripsi' => 'Usaha kerajinan rotan yang memproduksi berbagai produk seperti kursi, meja, dan tas.',
            'kategori' => 'Kerajinan',
            'alamat' => 'Jl. Desa Katingan RT 03/RW 02',
            'pemilik' => 'Eko Prasetyo',
            'kontak' => '081234567894',
            'is_active' => true,
        ]);

        Potensi::create([
            'nama' => 'Wisata Sungai Katingan',
            'slug' => 'wisata-sungai-katingan',
            'deskripsi' => 'Wisata alam menyusuri sungai Katingan dengan pemandangan hutan yang asri.',
            'kategori' => 'Wisata',
            'alamat' => 'Dermaga Desa Katingan',
            'kontak' => '081234567895',
            'latitude' => -1.857000,
            'longitude' => 113.365000,
            'is_active' => true,
        ]);

        Potensi::create([
            'nama' => 'Kebun Sayur Organik Desa',
            'slug' => 'kebun-sayur-organik-desa',
            'deskripsi' => 'Kebun sayur organik yang dikelola kelompok tani desa. Menyediakan sayuran segar tanpa pestisida.',
            'kategori' => 'Pertanian',
            'alamat' => 'Dusun Tiga, Desa Katingan',
            'pemilik' => 'Kelompok Tani Sejahtera',
            'kontak' => '081234567896',
            'is_active' => true,
        ]);
    }
}
