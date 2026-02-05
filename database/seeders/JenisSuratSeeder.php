<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisSurat;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisSurats = [
            [
                'kode' => 'SKD',
                'nama' => 'Surat Keterangan Domisili',
                'slug' => 'surat-domisili',
                'deskripsi' => 'Surat keterangan tempat tinggal untuk berbagai keperluan seperti melamar pekerjaan, membuka rekening bank, dan keperluan administrasi lainnya.',
                'persyaratan' => json_encode([
                    'Fotokopi KTP',
                    'Fotokopi Kartu Keluarga (KK)',
                    'Surat pengantar RT/RW',
                ]),
                'estimasi_hari' => 1,
                'is_active' => true,
                'icon' => 'home',
                'urutan' => 1,
            ],
            [
                'kode' => 'SKU',
                'nama' => 'Surat Keterangan Usaha',
                'slug' => 'surat-usaha',
                'deskripsi' => 'Surat keterangan untuk legalitas UMKM, pengajuan pinjaman modal, atau keperluan perizinan usaha.',
                'persyaratan' => json_encode([
                    'Fotokopi KTP',
                    'Fotokopi Kartu Keluarga (KK)',
                    'Foto tempat usaha',
                    'Surat pengantar RT/RW',
                ]),
                'estimasi_hari' => 2,
                'is_active' => true,
                'icon' => 'briefcase',
                'urutan' => 2,
            ],
            [
                'kode' => 'SKCK',
                'nama' => 'Surat Pengantar SKCK',
                'slug' => 'surat-skck',
                'deskripsi' => 'Surat pengantar dari desa untuk mengurus SKCK di kepolisian. Diperlukan untuk melamar kerja.',
                'persyaratan' => json_encode([
                    'Fotokopi KTP',
                    'Fotokopi Kartu Keluarga (KK)',
                    'Pas foto 4x6 (3 lembar)',
                    'Surat pengantar RT/RW',
                ]),
                'estimasi_hari' => 1,
                'is_active' => true,
                'icon' => 'shield-check',
                'urutan' => 3,
            ],
            [
                'kode' => 'SKTM',
                'nama' => 'Surat Keterangan Tidak Mampu',
                'slug' => 'surat-tidak-mampu',
                'deskripsi' => 'Surat keterangan bagi keluarga kurang mampu untuk keperluan beasiswa, keringanan biaya rumah sakit, atau bantuan sosial.',
                'persyaratan' => json_encode([
                    'Fotokopi KTP',
                    'Fotokopi Kartu Keluarga (KK)',
                    'Surat keterangan penghasilan',
                    'Surat pengantar RT/RW',
                    'Foto rumah (tampak depan)',
                ]),
                'estimasi_hari' => 2,
                'is_active' => true,
                'icon' => 'heart',
                'urutan' => 4,
            ],
            [
                'kode' => 'SKL',
                'nama' => 'Surat Keterangan Lahir',
                'slug' => 'surat-kelahiran',
                'deskripsi' => 'Surat keterangan kelahiran untuk pengurusan akta kelahiran dan keperluan administrasi kependudukan.',
                'persyaratan' => json_encode([
                    'Fotokopi KTP kedua orang tua',
                    'Fotokopi Kartu Keluarga (KK)',
                    'Surat keterangan lahir dari bidan/RS',
                    'Fotokopi buku nikah/akta nikah',
                ]),
                'estimasi_hari' => 1,
                'is_active' => true,
                'icon' => 'user-plus',
                'urutan' => 5,
            ],
            [
                'kode' => 'SKM',
                'nama' => 'Surat Keterangan Kematian',
                'slug' => 'surat-kematian',
                'deskripsi' => 'Surat keterangan kematian untuk pengurusan akta kematian, klaim asuransi, dan keperluan administrasi lainnya.',
                'persyaratan' => json_encode([
                    'Fotokopi KTP almarhum/ah',
                    'Fotokopi Kartu Keluarga (KK)',
                    'Surat keterangan meninggal dari RS/dokter',
                    'Fotokopi KTP pelapor',
                ]),
                'estimasi_hari' => 1,
                'is_active' => true,
                'icon' => 'document',
                'urutan' => 6,
            ],
        ];

        foreach ($jenisSurats as $jenisSurat) {
            JenisSurat::updateOrCreate(
                ['kode' => $jenisSurat['kode']],
                $jenisSurat
            );
        }
    }
}
