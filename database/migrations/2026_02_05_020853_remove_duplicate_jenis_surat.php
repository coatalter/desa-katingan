<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\JenisSurat;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Remove the duplicate 'Surat Keterangan Kematian' which has kode 'SKK'
        // We want to keep 'SKM' which is from the specialized seeder
        JenisSurat::where('kode', 'SKK')->delete();

        // Also ensure we remove any other potential duplicates if they exist and we prefer the Seeder versions
        // Since other codes (SKD, SKU, etc) are the same, they would have been updated, so likely only SKK is the issue.
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Optionally recreate it, but it's a duplicate so we probably don't want to.
    }
};
