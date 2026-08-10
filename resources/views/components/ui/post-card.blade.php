@props([
    'post'
])

<div class="group overflow-hidden rounded-3xl bg-white shadow-lg transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl">

    <!-- COVER -->
    <div class="relative overflow-hidden">
        <img src="{{ $post->image ? asset('storage/'.$post->image) : asset('images/no-image.jpg') }}" alt="{{ $post->title }}"
            class="h-64 w-full object-cover transition duration-700 group-hover:scale-110">

        <!-- BAGDE -->
        <div class="absolute left-4 top-4">
            <span class="rounded-full bg-[#5AA71B] px-4 py-1 text-xs font-light text-white">
                BERITA
            </span>
        </div>
    </div>

    <!-- BODY -->
    <div class="p-6">
        <p class="text-xs text-slate-500">
            {{ $post->created_at->format('d M Y') }}
        </p>
        <h3 class="mt-3 text-xl font-bold text-slate-800 line-clamp-2">
            {{ $post->title }}
        </h3>
        <p class="mt-4 text-slate-500 line-clamp-3">
            {{ $post->excerpt }}
        </p>
    </div>

    <!-- FOOTER -->
    <div class="flex items-center justify-between bg-[#5AA71B] px-6 py-4 text-white">
        <div>
            <div class="text-xs opacity-80">
                Penulis:
            </div>
            <div class="font-light text-sm">
                {{ $post->user?->name }}
            </div>
        </div>
        <a href="{{ route('berita.show', $post->slug) }}" class="rounded-xl bg-white/20 px-4 py-2 text-xs font-light transition 
        hover:bg-white hover:text-[#284114] hover:font-semibold ">
            Baca &raquo;
        </a>
    </div>

</div>