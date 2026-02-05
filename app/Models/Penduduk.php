<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penduduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'no_kk',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'pendidikan',
        'alamat',
        'rt',
        'rw',
        'dusun',
        'status_penduduk',
        'foto',
        'is_kepala_keluarga',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'is_kepala_keluarga' => 'boolean',
    ];

    /**
     * Get pengajuan surat for this penduduk
     */
    public function pengajuanSurats(): HasMany
    {
        return $this->hasMany(PengajuanSurat::class);
    }

    /**
     * Get user account linked to this penduduk
     */
    public function user()
    {
        return $this->hasOne(User::class, 'nik', 'nik');
    }

    /**
     * Get full address
     */
    public function getAlamatLengkapAttribute(): string
    {
        $parts = [$this->alamat];
        if ($this->rt)
            $parts[] = "RT {$this->rt}";
        if ($this->rw)
            $parts[] = "RW {$this->rw}";
        if ($this->dusun)
            $parts[] = "Dusun {$this->dusun}";
        return implode(', ', $parts);
    }

    /**
     * Get age
     */
    public function getUsiaAttribute(): int
    {
        return $this->tanggal_lahir->age;
    }

    /**
     * Scope for active residents
     */
    public function scopeAktif($query)
    {
        return $query->where('status_penduduk', 'Tetap');
    }
}
