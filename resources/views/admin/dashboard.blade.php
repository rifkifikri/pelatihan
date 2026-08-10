<x-app-layout>

    <div class="p-6 space-y-6">

        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 uppercase">
                    Selamat datang!
                </h1>
                <p class="mt-1 font-semibold text-[#5AA71B]">
                        {{ auth()->user()->name }}
                </p>
            </div>
        </div>

        {{-- Stat Card --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
            <x-ui.stat-card title="Total Berita" :value="$totalPosts" :subtitle="$publishedPosts.' Published • '.$draftPosts.' Draft'"  color="gray">
                <x-ui.svg name="navigation.newspaper" class="w-8 h-8 text-[#1ba7a7]" />
            </x-ui.stat-card>

            <x-ui.stat-card title="Pengguna" :value="$totalUsers" subtitle="Pengguna Terdaftar" color="green">
                <x-ui.svg name="navigation.user" class="w-8 h-8 text-[#1b68a7]" />
            </x-ui.stat-card>

            <x-ui.stat-card title="Pengajuan" :value="$totalPengajuan" subtitle="Menunggu Verifikasi" color="yellow">
                <x-ui.svg name="navigation.file-text" class="w-8 h-8 text-[#dcdf25]" />
            </x-ui.stat-card>
            <x-ui.stat-card title="Pengunjung" :value="$totalVisitors" subtitle="Hari Ini" color="pink">

                <x-ui.svg name="action.eye" class="w-8 h-8 text-[#9b1ba7]" />
            </x-ui.stat-card>

        </div>

        {{-- Content --}}
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            {{-- Quick Action --}}
            <div class="xl:col-span-2 rounded-3xl border border-green-100 bg-white p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="font-bold text-xl text-gray-800">
                        Aksi Cepat
                    </h2>
                    <span class="text-sm text-gray-400">
                        Shortcut
                    </span>
                </div>

                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 text-gray-700">
                    <a href="{{ route('admin.posts.create') }}" class="rounded-2xl border border-green-100 p-5 hover:border-[#5AA71B] hover:shadow-gray-300 hover:shadow-xl hover:-translate-y-1 transition">
                        <h3 class="font-semibold"> Tambah Berita </h3>
                        <p class="mt-2 text-sm text-gray-500"> Buat artikel baru </p>
                    </a>

                    <a href="{{ route('admin.users.index') }}" class="rounded-2xl border border-green-100 p-5 hover:border-[#5AA71B] hover:shadow-gray-300 hover:shadow-xl hover:-translate-y-1 transition">
                        <h3 class="font-semibold"> Pengguna </h3>
                            <p class="mt-2 text-sm text-gray-500"> Kelola akun </p>
                    </a>
                    
                    <div class="rounded-2xl border border-green-100 p-5">
                        <h3 class="font-semibold">
                            Pengajuan
                        </h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Periksa data
                        </p>
                    </div>

                    <div class="rounded-2xl border border-green-100 p-5">
                        <h3 class="font-semibold">
                            Pengaturan
                        </h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Konfigurasi sistem
                        </p>
                    </div>
                </div>
            </div>

            {{-- Activity --}}
            <div class="rounded-3xl border border-green-100 bg-white p-6">
                <h2 class="font-bold text-xl mb-6">
                    Aktivitas Sistem
                </h2>
                <div class="space-y-5">
                    <div>
                        <p class="font-medium">
                            Berita berhasil dipublikasikan
                        </p>
                        <span class="text-sm text-gray-500">
                            2 menit lalu
                        </span>
                    </div>
                    <div>
                        <p class="font-medium">
                            Pengguna baru mendaftar
                        </p>
                        <span class="text-sm text-gray-500">
                            10 menit lalu
                        </span>
                    </div>
                    <div>
                        <p class="font-medium">
                            Pengajuan baru masuk
                        </p>
                        <span class="text-sm text-gray-500">
                            25 menit lalu
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>