<section class="rounded-2xl bg-white p-8 shadow-sm">

    <h2 class="text-xl font-semibold text-[#407613]">
        Foto Profil
    </h2>

    <p class="mt-1 text-sm text-slate-500">
        Foto ini akan ditampilkan pada navbar.
    </p>

    <div class="mt-6 flex items-center gap-6">

        @if(Auth::user()->photo)

            <img
                src="{{ Storage::url(Auth::user()->photo) }}"
                class="h-28 w-28 rounded-full object-cover border-4 border-[#5aa71b]">

        @else

            <div
                class="flex h-28 w-28 items-center justify-center rounded-full bg-[#5aa71b] text-4xl font-bold text-white">

                {{ strtoupper(substr(Auth::user()->name,0,1)) }}

            </div>

        @endif

        <div>

            <input
                type="file"
                name="photo"
                class="block w-full rounded-lg border border-slate-300 text-sm">

            <p class="mt-2 text-xs text-slate-400">
                JPG, PNG maksimal 2 MB.
            </p>

        </div>

    </div>

</section>