<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuans', function (Blueprint $table) {

            $table->id();

            // Relasi User
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Nomor Pengajuan
            $table->string('nomor_pengajuan')->unique();

            // Data Surat
            $table->string('kota');
            $table->date('tanggal_pengajuan');

            // Data Pemohon
            $table->string('nama_pemohon');
            $table->string('jabatan');
            $table->string('nomor_ktp', 20);
            $table->text('alamat');
            $table->string('nomor_kontak', 20);

            // Data Produk
            $table->string('merk_produk');
            $table->string('nama_produk');
            $table->text('deskripsi_produk');
            $table->text('bahan_baku');
            $table->string('foto_produk')->nullable();

            // Status
            $table->foreignId('status_pengajuan_id')
                ->constrained()
                ->cascadeOnUpdate();

            // Catatan Admin
            $table->text('catatan')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
