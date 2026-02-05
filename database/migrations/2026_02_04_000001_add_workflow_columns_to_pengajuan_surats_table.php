<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pengajuan_surats', function (Blueprint $table) {
            // Add missing columns for surat workflow if they don't exist
            if (!Schema::hasColumn('pengajuan_surats', 'keterangan')) {
                $table->text('keterangan')->nullable()->after('keperluan');
            }
            if (!Schema::hasColumn('pengajuan_surats', 'nomor_surat')) {
                $table->string('nomor_surat', 100)->nullable()->after('catatan_admin');
            }
            if (!Schema::hasColumn('pengajuan_surats', 'processed_by')) {
                $table->foreignId('processed_by')->nullable()->constrained('users')->onDelete('set null')->after('diproses_oleh');
            }
            if (!Schema::hasColumn('pengajuan_surats', 'processed_at')) {
                $table->timestamp('processed_at')->nullable()->after('processed_by');
            }
        });

        // Modify status enum to include 'diproses'
        // Note: MySQL enum modification - we'll use raw SQL only if not sqlite
        if (DB::getDriverName() !== 'sqlite') {
            DB::statement("ALTER TABLE pengajuan_surats MODIFY COLUMN status ENUM('pending', 'verifikasi', 'proses', 'diproses', 'ttd', 'selesai', 'ditolak') DEFAULT 'pending'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengajuan_surats', function (Blueprint $table) {
            $table->dropForeign(['processed_by']);
            $table->dropColumn(['keterangan', 'nomor_surat', 'processed_by', 'processed_at']);
        });

        DB::statement("ALTER TABLE pengajuan_surats MODIFY COLUMN status ENUM('pending', 'verifikasi', 'proses', 'ttd', 'selesai', 'ditolak') DEFAULT 'pending'");
    }
};
