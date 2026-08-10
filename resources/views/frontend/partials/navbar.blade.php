<!-- <header x-data="{ mobile:false }"  class="sticky top-0 z-50 bg-gray shadow-lg mb-8"> -->
<header x-data="{ mobile:false }" class="fixed top-0 left-0 w-full z-50 bg-white/10 backdrop-blur-md transition-all duration-500">

    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between h-18 px-6">
            <!-- Logo -->
            <a href="{{ route('home') }}"
               class="flex items-center gap-3">
                <img src="{{ asset('img\green.png') }}" alt="HALAL CMS" class="h-11 w-auto">
                <div>
                    <h1 class="text-xl font-bold text-[#5AA71B] leading-none">
                        HALAL
                    </h1>
                    <p class="text-xs text-slate-500">
                        Content Management System
                    </p>
                </div>
            </a>

            <!-- Desktop Menu -->
            <nav class="hidden lg:flex items-center gap-8 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-[#5AA71B] transition">
                    Home
                </a>
                <a href="{{ route('berita.index') }}" class="hover:text-[#5AA71B] transition">
                    Berita
                </a>
                <a href="#" class="hover:text-[#5AA71B] transition">
                    Galeri
                </a>
                <a href="#" class="hover:text-[#5AA71B] transition">
                    Pengumuman
                </a>
                <a href="#" class="hover:text-[#5AA71B] transition">
                    Tentang
                </a>
            </nav>

            <!-- Login / Register -->
            @auth
                <a href="{{ auth()->user()->role === 'admin'
                    ? route('admin.dashboard')
                    : route('pengguna.dashboard') }}"
                class="bg-[#5AA71B] hover:bg-[#407613] text-white px-5 py-2 rounded-xl transition">
                    Dashboard
                </a>
            @else
            <div class="flex gap-2">
                <a href="{{ route('register') }}"
                class="border border-[#5AA71B] text-[#5AA71B] hover:bg-[#5AA71B] hover:text-white px-5 py-2 rounded-xl transition duration-300">
                    Daftar
                </a>
                <a href="{{ route('login') }}"
                class="bg-[#5AA71B] hover:bg-[#407613] text-white px-5 py-2 rounded-xl transition duration-300">
                    Login
                </a>
            </div>
            @endauth

            <!-- Mobile Button -->
            <button @click="mobile=!mobile" class="lg:hidden text-3xl">
<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#51bf22" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu-icon lucide-menu"><path d="M4 5h16"/><path d="M4 12h16"/><path d="M4 19h16"/></svg>
            </button>

        </div>

        <!-- Mobile Menu -->
        <div x-show="mobile" x-transition class="lg:hidden border-t bg-white">
            <nav class="flex flex-col p-5 space-y-4">
                <a href="{{ route('home') }}">Home</a>
                <a href="#">Berita</a>
                <a href="#">Galeri</a>
                <a href="#">Pengumuman</a>
                <a href="#">Tentang</a>
@auth
    <a href="{{ auth()->user()->role === 'admin'
        ? route('admin.dashboard')
        : route('pengguna.dashboard') }}"
       class="bg-[#5AA71B] hover:bg-[#407613] text-white px-5 py-2 rounded-xl transition">
        Dashboard
    </a>
@else
    <a href="{{ route('register') }}"
       class="border border-[#5AA71B] text-[#5AA71B] hover:bg-[#5AA71B] hover:text-white px-5 py-2 rounded-xl transition duration-300">
        Daftar
    </a>
    <a href="{{ route('login') }}"
       class="bg-[#5AA71B] hover:bg-[#407613] text-white px-5 py-2 rounded-xl transition duration-300">
        Login
    </a>
@endauth
            </nav>
        </div>
    </div>

</header>