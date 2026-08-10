<div class="border-y border-white/20 px-6 py-6">

    <div class="flex items-center gap-4">
        <div class="h-14 w-14 rounded-full  bg-white/20 flex items-center  justify-center text-2xl">
            <x-ui.avatar :name="Auth::user()->name" />
        </div>
        <div x-show="sidebar"  x-transition>
            <h3 class="font-semibold">
                {{ Auth::user()->name }}
            </h3>
            <p class="text-sm opacity-80">
                {{ Auth::user()->alias }}
            </p>

        </div>

    </div>

</div>