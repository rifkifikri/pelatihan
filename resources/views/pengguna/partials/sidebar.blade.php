<aside  x-bind:class="sidebar ? 'w-72' : 'w-24'"  class="fixed left-0 top-0 h-screen 
bg-linear-to-b from-[#cb27cb] via-[#b115b1] to-[#8d118d] text-white shadow-2xl transition-[width] duration-300 flex flex-col">

   <!-- Logo --->
    <div class="h-28 flex items-center justify-between px-4">
        <div class="flex items-center space-x-3 overflow-hidden">
           <!-- Logo --->
            <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-purple-800 font-bold">
                <img src="{{ asset('img\green.png') }}" alt="HALAL CMS" class="h-11 w-auto">
            </div>

            <div x-show="sidebar" class="whitespace-nowrap">
                <div>
                    <p class="text-sm text-gray-100">
                        Selamat Datang
                    </p>
                    <h1 class="text-xl font-semibold text-gray-800">
                        @yield('title', 'HALAL')
                    </h1>
                </div>
            </div>
            
        </div>
    <div class="flex items-center gap-4">
        <!--- Tombol Sidebar --->
        <button  @click="sidebar = !sidebar" class="p-2 rounded-lg hover:bg-purple-900 cursor-pointer">
            <x-ui.svg name="navigation.line_justify" class="w-5 h-5 text-gray-400 hover:text-gray-600"/>
        </button>
</div>
    </div>

   <!-- Menu --->
    <nav class="flex-1 py-4 text-xs">

       <!-- Dashboard --->
        <a href="{{ route('pengguna.dashboard') }}" class="flex items-center px-4 py-3 mx-3 rounded-lg hover:bg-purple-900 ">
        <x-ui.svg name="navigation.home" class="w-4 h-4 cursor-pointer hover:text-white"/>
            <span class="ml-3" x-cloak x-show="sidebar">
                Dashboard
            </span>

        </a>

       <!-- Pengajuan --->
        <a href="{{ route('pengguna.pengajuan.index') }}" class="flex items-center px-4 py-3 mx-3 rounded-lg hover:bg-purple-900 ">
        <x-ui.svg name="navigation.file-plus" class="w-4 h-4 cursor-pointer hover:text-white"/>
            <span class="ml-3" x-cloak x-show="sidebar">
                Pengajuan
            </span>
        </a>

       <!-- Profil --->
        <a href="#" class="flex items-center px-4 py-3 mx-3 rounded-lg hover:bg-purple-900 ">
        <x-ui.svg name="navigation.user" class="w-4 h-4 cursor-pointer hover:text-white"/>
            <span class="ml-3" x-cloak x-show="sidebar">
                Profil
            </span>
        </a>

    </nav>

   <!-- Footer --->
    <div class="border-t border-white-100 p-4">
        <div class="flex items-center">
            <div class="w-10 h-10 rounded-full bg-green-600 flex items-center justify-center font-bold">
                {{ strtoupper(substr(Auth::user()->name,0,1)) }}
            </div>

            <div x-show="sidebar" class="ml-3 overflow-hidden">
                <p class="font-normal whitespace-nowrap">
                   Dirjen Perhalalan 
                </p>
                <p class="font-light text-xs text-green-200">
                    YuksNgopi
                </p>
            </div>
        </div>
    </div>

</aside>