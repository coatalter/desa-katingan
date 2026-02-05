<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Admin roles that can access admin panel
     */
    public const ADMIN_ROLES = [
        'kepala_desa',
        'sekretaris',
        'kaur_pemerintahan',
        'kaur_keuangan',
        'kaur_umum',
        'admin',
        'petugas',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nik',
        'no_hp',
        'role',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get penduduk data linked to this user
     */
    public function penduduk(): HasOne
    {
        return $this->hasOne(Penduduk::class, 'nik', 'nik');
    }

    /**
     * Get all pengajuan surat by this user
     */
    public function pengajuanSurats(): HasMany
    {
        return $this->hasMany(PengajuanSurat::class);
    }

    /**
     * Get all berita authored by this user
     */
    public function beritas(): HasMany
    {
        return $this->hasMany(Berita::class, 'author_id');
    }

    /**
     * Check if user is Kepala Desa
     */
    public function isKepalaDesa(): bool
    {
        return $this->role === 'kepala_desa';
    }

    /**
     * Check if user can access admin panel
     */
    public function isAdmin(): bool
    {
        return in_array($this->role, self::ADMIN_ROLES);
    }

    /**
     * Check if user is warga
     */
    public function isWarga(): bool
    {
        return $this->role === 'warga';
    }

    /**
     * Get role label for display
     */
    public function getRoleLabelAttribute(): string
    {
        return match ($this->role) {
            'kepala_desa' => 'Kepala Desa',
            'sekretaris' => 'Sekretaris Desa',
            'kaur_pemerintahan' => 'Kaur Pemerintahan',
            'kaur_keuangan' => 'Kaur Keuangan',
            'kaur_umum' => 'Kaur Umum',
            'admin' => 'Administrator',
            'petugas' => 'Petugas',
            'warga' => 'Warga',
            default => ucfirst($this->role),
        };
    }

    /**
     * Scope for active users
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope by role
     */
    public function scopeRole($query, $role)
    {
        return $query->where('role', $role);
    }

    /**
     * Scope for admin users
     */
    public function scopeAdmins($query)
    {
        return $query->whereIn('role', self::ADMIN_ROLES);
    }
}
