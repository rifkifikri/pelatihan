@extends('layouts.pengguna')
@section('content')

<div class="space-y-6">

    <!--- Welcome --->
    <div class="bg-white rounded-xl shadow-sm p-6">

        <h2 class="text-2xl font-bold text-gray-800">
            Selamat Datang! <br><span class="text-lg">{{ Auth::user()->name }}</span>
        </h2>
        <p class="mt-2 text-gray-600">
            Selamat datang di Dashboard Pengguna.
            Gunakan menu di sebelah kiri untuk mengakses fitur yang tersedia.
        </p>
    </div>

    <!--- Statistik --->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <div class="bg-white rounded-xl shadow-sm p-5 border-l-4 border-green-600">
            <p class="text-gray-500 text-sm">
                Total Berita
            </p>
            <h3 class="text-3xl font-bold mt-2">
                0
            </h3>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-5 border-l-4 border-blue-500">
            <p class="text-gray-500 text-sm">
                Dibaca
            </p>
            <h3 class="text-3xl font-bold mt-2">
                0
            </h3>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-5 border-l-4 border-yellow-500">
            <p class="text-gray-500 text-sm">
                Notifikasi
            </p>
            <h3 class="text-3xl font-bold mt-2">
                0
            </h3>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-5 border-l-4 border-red-500">
            <p class="text-gray-500 text-sm">
                Aktivitas
            </p>
            <h3 class="text-3xl font-bold mt-2">
                0
            </h3>
        </div>

    </div>

    <!--- Aktivitas --->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">
            Aktivitas Terbaru
        </h3>
        <div class="text-gray-500 text-center py-12">
            Belum ada aktivitas yang ditampilkan.
        </div>
    </div>

</div>

@endsection