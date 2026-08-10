
<section x-data="heroSlider()" x-init="start()" class="relative h-screen overflow-hidden">

     <!-- Slide -->
    <template x-for="(slide,index) in slides" :key="index">

        <div x-show="current===index"
            x-transition:enter="transition-opacity duration-1000"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity duration-1000"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="absolute inset-0">

            <!-- Background -->
            <img :src="slide.image" class="w-full h-full object-cover">

            <!-- Overlay-->
            <div class="absolute inset-0 bg-black/45"></div>

            <!-- Content-->
            <div class="absolute inset-0 flex items-center">
                <div class="max-w-7xl mx-auto px-6 text-white">
                    <h1 class="text-5xl lg:text-7xl font-bold leading-tight" x-text="slide.title"> </h1>
                    <p class="mt-6 text-xl max-w-xl text-slate-200"  x-text="slide.subtitle"> </p>
<div class="flex flex-col-3 gap-4">

    <div class="mt-10">
        <a href="#berita" class="inline-flex items-center rounded-xl bg-[#b81cad] hover:bg-[#772371] px-8 py-4 text-lg font-semibold transition">
            Jelajahi Berita
        </a>
    </div>
    <div class="mt-10">
        <a href="#" class="inline-flex items-center rounded-xl bg-[#b81cad] hover:bg-[#772371] px-8 py-4 text-lg font-semibold transition">
            Jelajahi Galeri
        </a>
    </div>
    <div class="mt-10">
        <a href="#" class="inline-flex items-center rounded-xl bg-[#b81cad] hover:bg-[#772371] px-8 py-4 text-lg font-semibold transition">
            Jelajahi Pengumuman
        </a>
    </div>
</div>

                </div>

            </div>

        </div>

    </template>

    <!-- Previous-->
    <button
        @click="prev()"
        class="absolute left-8 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/20 backdrop-blur text-white hover:bg-[#5AA71B] transition">

        ❮

    </button>

    <!-- Next-->
    <button
        @click="next()"
        class="absolute right-8 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-white/20 backdrop-blur text-white hover:bg-[#5AA71B] transition">

        ❯

    </button>

    <!-- Dot Indicator-->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex gap-3">

        <template x-for="(slide,index) in slides">

            <button
                @click="current=index"
                class="w-3 h-3 rounded-full transition"
                :class="current==index
                    ? 'bg-[#9f1984] scale-125'
                    : 'bg-white/50'">

            </button>

        </template>

    </div>

</section>

