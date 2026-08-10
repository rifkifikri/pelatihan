<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusPengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status_pengajuans')->insert([
            [
                'nama_status' => 'Draft',
                'warna' => 'secondary',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_status' => 'Diajukan',
                'warna' => 'info',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_status' => 'Diverifikasi',
                'warna' => 'warning',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_status' => 'Disetujui',
                'warna' => 'success',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_status' => 'Ditolak',
                'warna' => 'danger',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    
}