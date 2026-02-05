<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
        'slug',
        'deskripsi',
        'persyaratan',
        'estimasi_hari',
        'is_active',
        'icon',
        'urutan',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'persyaratan' => 'array',
    ];

    /**
     * Get all pengajuan for this jenis surat
     */
    public function pengajuanSurats(): HasMany
    {
        return $this->hasMany(PengajuanSurat::class);
    }

    /**
     * Scope for active types only
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('urutan');
    }

    /**
     * Get route key name
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
