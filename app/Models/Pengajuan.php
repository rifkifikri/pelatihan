<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengajuan extends Model
{
    protected $fillable = [
        'user_id',
        'nomor_pengajuan',
        'kota',
        'tanggal_pengajuan',
        'nama_pemohon',
        'jabatan',
        'nomor_ktp',
        'alamat',
        'nomor_kontak',

        'merk_produk',
        'nama_produk',
        'deskripsi_produk',
        'bahan_baku',
        'foto_produk',

        'status_pengajuan_id',
        'catatan',
    ];

    /**
     * Relasi ke User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Status Pengajuan
     */
    public function statusPengajuan(): BelongsTo
    {
        return $this->belongsTo(StatusPengajuan::class);
    }
}