@extends('layouts.pengguna')
@section('content')

<div class="space-y-6 mt-5">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-lg font-semibold text-gray-700">
                Form Pengajuan
            </h2>          
            <p class="text-gray-500 mt-1">
                Silakan lengkapi formulir pengajuan sertifikasi halal.
            </p>
        </div>

        <a href="{{ route('pengguna.pengajuan.index') }}">
            <x-ui.button variant="secondary" size="md">
                Kembali
            </x-ui.button>            
        </a>
    </div>

    <!--form pengajuan dari form-->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('pengguna.pengajuan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('pengguna.pengajuan.partials.form')
        </form>
    </div>    
</div>

@endsection