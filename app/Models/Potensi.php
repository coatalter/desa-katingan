<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potensi extends Model
{
    use HasFactory;

    protected $table = 'potensis';

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'kategori',
        'alamat',
        'pemilik',
        'kontak',
        'gambar',
        'latitude',
        'longitude',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
    ];

    /**
     * Scope for active items
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope by category
     */
    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }



    /**
     * Check if has coordinates
     */
    public function getHasCoordinatesAttribute(): bool
    {
        return !is_null($this->latitude) && !is_null($this->longitude);
    }
}
