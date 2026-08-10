<nav class="flex-1 px-4 py-6 space-y-2 text-xs">

    <a href="{{ route('admin.dashboard') }}"
       class="flex items-center gap-4 rounded-xl px-4 py-3  hover:bg-white/20 transition">
        <x-ui.svg name="navigation.home" class="w-4 h-4  hover:text-white"/>
       <span x-show="sidebar" x-transition> Dashboard </span>
    </a>

    <a href="{{ route('admin.users.index') }}" class="flex items-center gap-4 rounded-xl px-4 py-3 hover:bg-white/20 transition">
        <x-ui.svg name="navigation.home" class="w-4 h-4  hover:text-white"/>
        <span x-show="sidebar"> Manajemen User </span>
    </a>
    <a href="#" class="flex items-center gap-4 rounded-xl px-4 py-3  hover:bg-white/20 transition">
        <x-ui.svg name="navigation.folder-cog" class="w-4 h-4  hover:text-white"/>
        <span x-show="sidebar"> Master Data </span>
    </a>

    <!-- KONTEN -->
<div x-data="{ openContent: false }">

    <button  @click="openContent = !openContent"  class="w-full flex items-center justify-start rounded-xl px-4 py-3 cursor-pointer hover:bg-white/20 transition">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#a6ddad" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image-plus-icon lucide-image-plus"><path d="M16 5h6"/><path d="M19 2v6"/><path d="M21 11.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h7.5"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/><circle cx="9" cy="9" r="2"/></svg>            

        <span x-show="sidebar" class="ps-4 ">
            Konten
        </span>
        <span x-show="sidebar" class="ps-4">
            <span x-text="openContent ? '-' : '+'"></span>
        </span>

    </button>

    <div x-show="openContent" x-transition class="ml-8 mt-2 space-y-2">
        <a href="{{ route('admin.posts.index') }}"
           class="block rounded-lg px-3 py-2 hover:bg-white/20 transition">
            Berita
        </a>
        <a href="#"
           class="block rounded-lg px-3 py-2 hover:bg-white/20 transition">
            Galeri
        </a>

        <a href="#" class="block rounded-lg px-3 py-2 hover:bg-white/20 transition">
            Pengumuman
        </a>
    </div>

</div>

    <a href="#" class="flex items-center gap-4 rounded-xl  px-4 py-3  hover:bg-white/20 transition">
        <x-ui.svg name="navigation.file-text" class="w-4 h-4  hover:text-white"/>
        <span x-show="sidebar"> Laporan </span>
    </a>
</nav>

