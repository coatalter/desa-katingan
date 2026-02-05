<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class PengajuanSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_pengajuan',
        'user_id',
        'penduduk_id',
        'jenis_surat_id',
        'keperluan',
        'keterangan',
        'data_tambahan',
        'dokumen_pendukung',
        'status',
        'catatan_admin',
        'alasan_tolak',
        'nomor_surat',
        'file_hasil',
        'qr_token',
        'diproses_oleh',
        'processed_by',
        'processed_at',
        'tanggal_selesai',
    ];

    protected $casts = [
        'tanggal_selesai' => 'datetime',
        'processed_at' => 'datetime',
        'data_tambahan' => 'array',
        'dokumen_pendukung' => 'array',
    ];

    /**
     * Boot method to generate nomor pengajuan
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->nomor_pengajuan)) {
                $model->nomor_pengajuan = self::generateNomorPengajuan();
            }
            if (empty($model->qr_token)) {
                $model->qr_token = Str::uuid();
            }
        });
    }

    /**
     * Generate unique request number
     */
    public static function generateNomorPengajuan(): string
    {
        $year = date('Y');
        $count = self::whereYear('created_at', $year)->count() + 1;
        return sprintf('REQ-%s-%05d', $year, $count);
    }

    /**
     * Get user relationship
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get penduduk relationship
     */
    public function penduduk(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class);
    }

    /**
     * Get jenis surat relationship
     */
    public function jenisSurat(): BelongsTo
    {
        return $this->belongsTo(JenisSurat::class);
    }

    /**
     * Get admin who processed this
     */
    public function prosesOleh(): BelongsTo
    {
        return $this->belongsTo(User::class, 'diproses_oleh');
    }

    /**
     * Get admin who processed this (alias for SuratController)
     */
    public function processedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'processed_by');
    }

    /**
     * Status labels for display
     */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'Menunggu',
            'verifikasi' => 'Verifikasi',
            'diproses' => 'Sedang Diproses',
            'proses' => 'Diproses',
            'ttd' => 'Tanda Tangan',
            'selesai' => 'Selesai',
            'ditolak' => 'Ditolak',
            default => ucfirst($this->status),
        };
    }

    /**
     * Status color for badges
     */
    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'warning',
            'verifikasi', 'proses', 'ttd' => 'process',
            'selesai' => 'success',
            'ditolak' => 'danger',
            default => 'gray',
        };
    }

    /**
     * Scope for pending requests
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope for in-progress requests
     */
    public function scopeInProgress($query)
    {
        return $query->whereIn('status', ['verifikasi', 'proses', 'ttd']);
    }
}
