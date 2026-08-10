@extends('layouts.pengguna')
@section('content')

<div>  
    <div class="p-6 border-b border-zinc-300">
        <h2 class="text-xl font-bold uppercase text-stone-800">
            Data RINCI Pengajuan 
        </h2>
    </div>
<x-ui.card class="mb-3">    
    <div class="max-w-7xl mx-auto px-2 py-0">
       <!-- Data pemohon -->
       <div>
       <h2 class="text-lg font-semibold text-green-700 border-b border-green-200 mb-7">
           Data Pemohon
       </h2>              
       <div>
        <div class="grid md:grid-cols-4 gap-2 mb-2">
            <div class="md:col-span-1">
                <label class="block mb-2 text-sm font-medium text-gray-700">Nama Pemohon</label>
            </div>           
            <div class="md:col-span-3">
                <label class="text-gray-600 mr-2">:</label>
                <span class="font-semibold text-gray-700 uppercase">{{ $pengajuan->nama_pemohon }}</span>
            </div>
        </div>  
        
        <div class="grid md:grid-cols-4 gap-2 mb-2">
            <div class="md:col-span-1">
                <label class="block mb-2 text-sm font-medium text-gray-700">NIK</label>
            </div>
            <div class="md:col-span-3">
                <label class="text-gray-600 mr-2">:</label>
                <span class="font-semibold text-gray-700">{{ $pengajuan->nomor_ktp }}</span>
            </div>
        </div>          
        
        <div class="grid md:grid-cols-4 gap-2 mb-2">
            <div class="md:col-span-1">
                <label class="block mb-2 text-sm font-medium text-gray-700">Jabatan Organisasi</label>
            </div>
            <div class="md:col-span-3">
                <label class="text-gray-600 mr-2">:</label>
                <span class="font-semibold text-gray-700 uppercase">{{ $pengajuan->jabatan }}</span>
            </div>
        </div>          
        
        <div class="grid md:grid-cols-4 gap-2 mb-2">
            <div class="md:col-span-1">
                <label class="block mb-2 text-sm font-medium text-gray-700">Nomor Telepon</label>
            </div>
            <div class="md:col-span-3">
                <label class="text-gray-600 mr-2">:</label>
                <span class="font-semibold text-gray-700 uppercase">{{ $pengajuan->nomor_kontak }}</span>
            </div>
        </div>           
        <!-- Tanggal permohonan -->
        <div>
            <h2 class="text-lg font-semibold text-green-700 border-b border-green-200 pb-3 mb-6 mt-10">
                DATA SURAT
            </h2>            
        <div>
        <div class="grid md:grid-cols-4 gap-2 mb-2">
            <div class="md:col-span-1">
                <label class="block mb-2 text-sm font-medium text-gray-700">Nomor Pengajuan</label>
            </div>
            <div class="md:col-span-3">
                <label class="text-gray-600 mr-2">:</label>
                <span class="font-semibold text-gray-700 uppercase">{{ $pengajuan->nomor_pengajuan }}</span>
            </div>
        </div>              
        <div class="grid md:grid-cols-4 gap-2 mb-2">
            <div class="md:col-span-1">
                <label class="block mb-2 text-sm font-medium text-gray-700">Tanggal Pengajuan</label>
            </div>
            <div class="md:col-span-3">
                <label class="text-gray-600 mr-2">:</label>
                <span class="font-semibold text-gray-700 uppercase">
                {{ \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->translatedFormat('d F Y') }}</span>
            </div>
        </div>              
        <!-- Info Produk -->
        <div>
        <h2 class="text-lg font-semibold text-green-700 border-b border-green-200 pb-3 mb-6 mt-10">
            Info Produk
        </h2>
        </div>

<div class="grid md:grid-cols-4 gap-4">
    <div class="md:col-span-1">
        <label for="foto_produk" class="block mb-2 text-sm font-medium text-gray-700">
            Foto Produk
        </label>
        @if(!empty($pengajuan?->foto_produk))
        <div class="mt-3">
        <img src="{{ asset('storage/'.$pengajuan->foto_produk) }}" class="w-70 rounded-lg">
        </div>
        @endif    
    </div>
    <div class="md:col-span-3">
        <div class="grid md:grid-cols-4 gap-2 mb-2">    
            <div class="md:col-span-1">
                <label class="block mb-2 text-sm font-medium text-gray-700">Nama Produk</label>
            </div>
            <div class="md:col-span-3">
                <label class="text-gray-600 mr-2">:</label>
                <span class="font-semibold text-gray-700 uppercase">{{ $pengajuan->nama_produk }}</span>
            </div>
        </div>           
        <div class="grid md:grid-cols-4 gap-2 mb-2">
            <div class="md:col-span-1">
                <label class="block mb-2 text-sm font-medium text-gray-700">Merk Produk</label>
            </div>
            <div class="md:col-span-3">
                <label class="text-gray-600 mr-2">:</label>
                <span class="font-semibold text-gray-700 uppercase">{{ $pengajuan->merk_produk }}</span>
            </div>
        </div>     
        <div class="grid md:grid-cols-4 gap-2 mb-2">
            <div class="md:col-span-1">
                <label class="block mb-2 text-sm font-medium text-gray-700">Deskripsi Produk</label>
            </div>
            <div class="md:col-span-3">
                <label class="text-gray-600 mr-2">:</label>
                <span class="font-semibold text-gray-700 uppercase">{{ $pengajuan->deskripsi_produk }}</span>
            </div>
        </div>    
        <div class="grid md:grid-cols-4 gap-2 mb-2">
            <div class="md:col-span-1">
                <label class="block mb-2 text-sm font-medium text-gray-700">Bahan Baku</label>
            </div>
            <div class="md:col-span-3">
                <label class="text-gray-600 mr-2">:</label>
                <span class="font-semibold text-gray-700 uppercase">{{ $pengajuan->bahan_baku }}</span>
            </div>
        </div>     
    </div>    
</div>        


</x-ui.card>

<div class="flex justify-end gap-3">
    <a href="{{ route('pengguna.pengajuan.index') }}" class="px-6 py-3 rounded-lg bg-gray-500 hover:bg-gray-600 text-white">
        Kembali
    </a>
</div>    
    
    </div>      
</div>   
@endsection