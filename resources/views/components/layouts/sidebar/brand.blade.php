<div class="flex items-center justify-between px-6 py-6">

    <div x-show="sidebar" x-transition >
        <h1 class="text-3xl font-black tracking-wider">
            HALAL
        </h1>
        <p class="text-xs opacity-80">
            Himpunan Aplikasi Latihan Anak Laravel
        </p>
    </div>

    <button  @click="sidebar=!sidebar" class="rounded-xl  bg-white/20  p-2   hover:bg-white/30 transition">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#27a035" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu-icon lucide-menu"><path d="M4 5h16"/><path d="M4 12h16"/><path d="M4 19h16"/></svg>
    </button>
</div>