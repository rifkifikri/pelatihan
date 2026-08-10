<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StatusPengajuan extends Model
{
    protected $fillable = [
        'nama_status',
        'warna',
    ];

    /**
     * Satu status dimiliki banyak pengajuan.
     */
    public function pengajuans(): HasMany
    {
        return $this->hasMany(Pengajuan::class);
    }
}