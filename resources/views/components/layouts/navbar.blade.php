<header class="sticky top-0 z-40 h-20
           flex items-center justify-between
           bg-white/70 backdrop-blur-md
           border-b border-slate-200
           px-10">

    <div>
        <h2 class="text-2xl font-bold text-[#407613]">
            Dashboard
        </h2>
        <p class="text-sm text-slate-600">
            Selamat datang kembali
        </p>
    </div>

    <div class="flex items-center gap-6">
        <button class="relative rounded-2xl border border-green-100 bg-white p-3 hover:border-[#5AA71B] transition">
            <x-ui.svg name="dashboard.bell" class="w-5 h-5 text-gray-600"/>
                <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-red-500 text-white text-[10px] flex items-center justify-center">
                    3
                </span>
        </button>

        <div x-data="{ open: false }" class="relative">
            <!-- Tombol Avatar -->
            <button @click="open = !open" 
                class="flex items-center gap-3 rounded-xl p-1 transition hover:bg-slate-100 cursor-pointer">
                @if(Auth::user()->photo)
                    <img
                        src="{{ Storage::url(Auth::user()->photo) }}"
                        alt="{{ Auth::user()->name }}"
                        class="h-12 w-12 rounded-full object-cover border-2 border-[#5aa71b]">
                @else
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-[#5aa71b] text-xl font-bold text-white">
                        {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                    </div>
                @endif

                <div class="text-left hidden md:block">
                    <div class="font-semibold">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="text-sm text-slate-500">
                        {{ Auth::user()->alias }}
                    </div>
                </div>

                <svg class="h-5 w-5 text-slate-500">
                    <path fill="currentColor"
                        d="M7 10l5 5 5-5z"/>
                </svg>
            </button>
            <!-- Dropdown -->
            <div x-show="open" @click.away="open = false" x-transition 
            class="absolute right-0 mt-3 w-56 overflow-hidden 
            rounded-b-2xl bg-white shadow-xl cursor-pointer">

                <a href="{{ route('profile.edit') }}"
                class="flex items-center px-5 py-3 hover:bg-gray-200">
                    <x-ui.svg name="navigation.user" class="w-5 h-5 text-gray-500" />
                    <span class="ml-3 text-gray-800 text-xs">Profil</span>
                </a>

                <a href="{{ route('profile.edit') }}" class="flex items-center px-5 py-3 hover:bg-gray-200">
                    <x-ui.svg name="action.edit" class="w-4 h-4 text-gray-500" />
                    <span class="ml-3 text-gray-800 text-xs">Edit Profil</span>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="flex w-full items-center px-5 py-3 text-left text-red-600 hover:bg-gray-200 cursor-pointer">
                        <x-ui.svg name="navigation.log-out" class="w-4 h-4 text-gray-500" />
                        <span class="ml-3 text-gray-800 text-xs">Logout</span>
                    </button>
                </form>

            </div>

        </div>
        


    </div>

</header>