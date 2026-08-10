<nav class="bg-white shadow border-b border-gray-100 flex items-center justify-end p-4 px-7">

<!--- Kanan --->
    <div class="flex items-center gap-5">

        <!--- Notifikasi --->
        <button class="relative p-2 rounded-lg hover:bg-green-100 ">
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke-width="1.8"
                 stroke="currentColor"
                 class="w-6 h-6 text-gray-600">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18.75 9.75V9A6.75 6.75 0 0 0 5.25 9v.75a8.967 8.967 0 0 1-1.561 6.022 23.848 23.848 0 0 0 5.454 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"/>
            </svg>
            <span class="absolute top-1 right-1 w-2 h-2 rounded-full bg-red-500"> </span>
        </button>

        <!--- User --->
        <div x-data="{ open:false }" class="relative">
            <button @click="open=!open" class="flex items-center gap-3  rounded-lg px-3 py-2 cursor-pointer">
                <div class="w-10 h-10 rounded-full bg-green-700 text-white 
                flex items-center justify-center font-bold">
                    {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                </div>
                <div class="hidden md:block text-left">
                    <p class="font-medium text-gray-700">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="text-xs text-gray-500">
                        Pengguna
                    </p>
                </div>
            </button>

            <!--- Dropdown --->
            <div x-show="open" @click.away="open=false"  
            class="absolute right-0 mt-7 w-48 bg-white rounded-xl shadow-lg border 
            border-green-300 overflow-hidden z-50 cursor-pointer">
                <a href="#" class="flex items-center px-5 py-3 hover:bg-gray-200">
                    <x-ui.svg name="navigation.user" class="w-5 h-5 text-gray-500" />
                    <span class="ml-3 text-gray-800 text-sm">Profil</span>
                </a>    
                <hr class=" border-green-300">

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

</nav>