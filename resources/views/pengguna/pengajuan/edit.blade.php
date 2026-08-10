@extends('layouts.pengguna')
@section('content')

<div>

    <div class="p-6 border-b border-zinc-300">
        <h2 class="text-xl font-bold uppercase text-stone-800">
            Ubah data Pengajuan
        </h2>
    </div>
    <section class="py-10">
    <form action="{{ route('pengguna.pengajuan.update', $pengajuan) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="space-y-8">
        <!-- DATA SURAT -->
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-green-700 border-b border-green-200 pb-3 mb-6">
                    Data Surat
                </h2>
                <div class="space-y-6">
                    <!-- Kota -->
                    <div>
                        <label for="kota" class="block mb-2 text-sm font-medium text-gray-700">
                            Kota
                        </label>
                        <input type="text" id="kota" name="kota" value="{{ old('kota', $pengajuan->kota ?? '') }}" placeholder="Contoh : Bandung" class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-green-600 focus:ring-0 transition">
                    </div>
                    <!-- Tanggal -->
                    <div>
                        <label for="tanggal_pengajuan" class="block mb-2 text-sm font-medium text-gray-700">
                            Tanggal Pengajuan
                        </label>
                        <input type="date" id="tanggal_pengajuan" name="tanggal_pengajuan" value="{{ old('tanggal_pengajuan', $pengajuan->tanggal_pengajuan ?? '') }}" class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-green-600 focus:ring-0 transition">
                    </div>
                </div>
            </div>
    </section>

    <section class="py-10">
        <!-- DATA PEMOHON -->
        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-green-700 border-b border-green-200 pb-3 mb-6">
                Data Pemohon
            </h2>
            <div class="space-y-6">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Nama Pemohon
                    </label>
                    <input type="text" name="nama_pemohon"  value="{{ old('nama_pemohon', $pengajuan->nama_pemohon ?? '') }}" class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-green-600 focus:ring-0">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Jabatan
                    </label>
                    <input type="text" name="jabatan"  value="{{ old('jabatan', $pengajuan->jabatan ?? '') }}" class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-green-600 focus:ring-0">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Nomor KTP
                    </label>
                    <input type="text" name="nomor_ktp"   value="{{ old('nomor_ktp', $pengajuan->nomor_ktp ?? '') }}" class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-green-600 focus:ring-0">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Alamat
                    </label>
                    <textarea
                        name="alamat" rows="4" class="w-full rounded-lg border border-gray-300 px-4 py-3
                        focus:border-green-600 focus:ring-0">{{ old('alamat', $pengajuan->alamat ??'') }}</textarea>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Nomor Kontak
                    </label>
                    <input type="text" name="nomor_kontak"   value="{{ old('nomor_kontak', $pengajuan->nomor_kontak ?? '') }}" class="w-full rounded-lg border border-gray-300 px-4 py-3  focus:border-green-600 focus:ring-0">
                </div>
            </div>
        </div>    
    </section>

    <section class="py-10"> 
        <!-- FOTO PRODUK -->
        <div>
            <label for="foto_produk" class="block mb-2 text-sm font-medium text-gray-700">
                Foto Produk
            </label>

            @if(!empty($pengajuan?->foto_produk))
            <div class="mt-3">
                <img src="{{ asset('storage/'.$pengajuan->foto_produk) }}" class="w-40 rounded-lg border">
            </div>
            @endif
            <input type="file" name="foto_produk">
            <div id="previewContainer" class="hidden mt-5">
                <p class="text-sm text-gray-600 mb-2">
                    Tampilan Foto
                </p>
                <img id="previewImage" class="max-w-md rounded-lg border border-gray-200 shadow-sm">
            </div>
        </div>           
        <!-- DATA PRODUK -->
        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-green-700 border-b border-green-200 pb-3 mb-6">
                Data Produk
            </h2>
            <div class="space-y-6">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Merk produk
                    </label>
                    <input type="text" name="merk_produk" value="{{ old('merk_produk', $pengajuan->merk_produk ?? '') }}" class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-green-600 focus:ring-0">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Nama Produk
                    </label>
                    <input type="text" name="nama_produk" value="{{ old('nama_produk', $pengajuan->nama_produk ?? '' ) }}" class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-green-600 focus:ring-0">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Deskripsi Produk
                    </label>
                    <textarea name="deskripsi_produk" rows="4" class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-green-600 focus:ring-0">{{ old('deskripsi_produk', $pengajuan->deskripsi_produk  ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">
                        Bahan Baku
                    </label>
                    <textarea name="bahan_baku" rows="4" class="w-full rounded-lg border border-gray-300 px-4 py-3  
                    focus:border-green-600 focus:ring-0">{{ old('bahan_baku', $pengajuan->bahan_baku  ?? '') }}</textarea>
                </div>
            </div>
        </div>    
            <div class="flex justify-end gap-3">
                <a href="{{ route('pengguna.pengajuan.index') }}" class="px-6 py-3 rounded-lg bg-gray-500 hover:bg-gray-600 text-white">
                    Batal
                </a>
                <button type="submit" class="px-6 py-3 rounded-lg bg-green-600 hover:bg-green-700 text-white">
                    {{ isset($pengajuan) ? 'Perbarui Pengajuan' : 'Simpan Pengajuan' }}
                </button>
            </div>

    </section>

    </form>
</div>
@endsection