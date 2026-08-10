<section id="berita" class="py-24 bg-slate-50">

    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="rounded-full bg-green-100 px-5 py-2 text-sm font-semibold text-[#5AA71B]">
                Berita Terbaru
            </span>
            <h2 class="mt-6 text-5xl font-bold">
                Informasi Terkini
            </h2>

            <p class="mt-5 text-slate-500 max-w-2xl mx-auto">
                Ikuti perkembangan informasi terbaru yang dipublikasikan melalui
                website HALAL CMS.
            </p>
        </div>

        <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">
            @forelse($posts as $post)
                <x-ui.post-card :post="$post"/>
            @empty
                <div class="col-span-3 py-20 text-center">
                    Belum ada berita.
                </div>
            @endforelse
        </div>
    </div>
    <div class="text-center mt-12">
        <a href="{{ route('berita.index') }}">
            <x-ui.button>
                Lihat Semua Berita
            </x-ui.button>
        </a>
    </div>
</section>