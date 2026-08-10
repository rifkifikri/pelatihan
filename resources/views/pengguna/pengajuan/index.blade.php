@extends('layouts.pengguna')
@section('content')

<div class="space-y-8 mt-7">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <p class="text-gray-500 mt-1">
                Daftar pengajuan sertifikasi halal Anda.
            </p>
        </div>
        <div>
@if (session('success'))
    <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3">
        <div class="flex items-center gap-3">
            <x-ui.svg name="status.success" class="w-8 h-8" />
            <span class="text-sm font-medium text-green-700">
                {{ session('success') }}
            </span>
        </div>
    </div>
@endif
        </div>
        <a href="{{ route('pengguna.pengajuan.create') }}">          
            <x-ui.button variant="info" size="md">Pengajuan Baru</x-ui.button>            
        </a>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-[#36a130] text-gray-200">
                    <tr>
                        <th class="px-5 py-3 text-left text-sm font-semibold">
                            No
                        </th>
                        <th class="px-5 py-3 text-left text-sm font-semibold">
                            Nomor Pengajuan
                        </th>
                        <th class="px-5 py-3 text-left text-sm font-semibold">
                            Nama Produk
                        </th>
                        <th class="px-5 py-3 text-left text-sm font-semibold">
                            Tanggal
                        </th>
                        <th class="px-5 py-3 text-center text-sm font-semibold">
                            Status
                        </th>
                        <th class="px-5 py-3 text-center text-sm font-semibold">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @forelse ($pengajuans as $pengajuan)
                        <tr class="hover:bg-green-50 transition">
                            <td class="px-5 py-4">
                                {{ $pengajuans->firstItem() + $loop->index }}
                            </td>
                            <td class="px-5 py-4 font-medium text-gray-700">
                                {{ $pengajuan->nomor_pengajuan }}
                            </td>
                            <td class="px-5 py-4">
                                {{ $pengajuan->nama_produk }}
                            </td>
                            <td class="px-5 py-4">
                                {{ \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->format('d M Y') }}
                            </td>
                            <td class="px-5 py-4 text-center">
                                @php
                                    $warna = match(optional($pengajuan->statusPengajuan)->warna){
                                        'green' => 'bg-green-100 text-green-700',
                                        'blue' => 'bg-blue-100 text-blue-700',
                                        'yellow' => 'bg-yellow-100 text-yellow-700',
                                        'red' => 'bg-red-100 text-red-700',
                                        default => 'bg-gray-100 text-gray-700',
                                    };
                                @endphp
                                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $warna }}">
                                   {{ optional($pengajuan->statusPengajuan)->nama_status ?? '-' }}
                                </span>
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex justify-center gap-2 h-7">
                                    <!-- Lihat -->
                                    <div class="relative inline-block group">                                     
                                        <a href="{{ route('pengguna.pengajuan.show', $pengajuan) }}">
                                        <x-ui.button variant="info2" size="sm" title="Lihat">
                                            <x-ui.svg name="action.eye" class="w-4 h-4 cursor-pointer"/>
                                        </x-ui.button>  
                                            <span class="absolute bottom-full left-1/2 mb-2 -translate-x-1/2
                                                    rounded-md bg-sky-800 px-2 py-1 text-xs text-white
                                                    opacity-0 transition-opacity duration-200
                                                    group-hover:opacity-100 whitespace-nowrap">
                                                Lihat
                                            </span>
                                        </a>
                                    </div>
                                    <!-- Edit -->                                    
                                    <div class="relative inline-block group">                                     
                                        @if(optional($pengajuan->statusPengajuan)->nama_status == 'Draft')
                                        <a href="{{ route('pengguna.pengajuan.edit', $pengajuan) }}">
                                            <x-ui.button variant="warning" size="sm" title="Edit">
                                                <x-ui.svg name="action.edit" class="w-4 h-4 cursor-pointer"/>
                                            </x-ui.button>   
                                            <span class="absolute bottom-full left-1/2 mb-2 -translate-x-1/2
                                            rounded-md bg-yellow-600 px-2 py-1 text-xs text-white
                                            opacity-0 transition-opacity duration-200
                                            group-hover:opacity-100 whitespace-nowrap">
                                            Edit
                                        </span>                                          
                                    </a>
                                </div>
                                <div class="relative inline-block group">                                              
                                        <!-- Hapus -->
                                        <form action="{{ route('pengguna.pengajuan.destroy', $pengajuan) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus pengajuan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <x-ui.button type="submit" variant="danger" size="sm" title="Hapus">
                                                <x-ui.svg name="action.trash" class="w-4 h-4 cursor-pointer"/>
                                            </x-ui.button>
                                            <span class="absolute bottom-full left-1/2 mb-2 -translate-x-1/2
                                                    rounded-md bg-red-700 px-2 py-1 text-xs text-white
                                                    opacity-0 transition-opacity duration-200
                                                    group-hover:opacity-100 whitespace-nowrap">
                                                Hapus
                                            </span>  
                                        </form>
                                        @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="py-20 text-center">
                                    <div class="text-6xl mb-4">
                                        
                                    </div>
                                    <h2 class="text-xl font-semibold text-gray-700">
                                        Belum Ada Pengajuan
                                    </h2>
                                    <p class="text-gray-500 mt-2">
                                        Silakan klik tombol
                                        <strong>Pengajuan Baru</strong>
                                        untuk membuat pengajuan pertama.
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div>
        {{ $pengajuans->links() }}
    </div>
</div>

@endsection