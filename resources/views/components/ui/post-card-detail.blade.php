@props([
    'post'
])

<article class="max-w-5xl mx-auto bg-white rounded-3xl shadow-lg overflow-hidden">
    <!-- Cover -->
    @if($post->image)
        <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="w-full h-calc(420/16*1rem) object-cover">
    @endif

    <!-- Content -->
    <div class="p-8 lg:p-12">

        <!-- Meta -->
        <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500 mb-6">
            <span>{{ $post->created_at->format('d F Y') }}</span>
            <span>{{ $post->author }}</span>
            <span
                class="px-3 py-1 rounded-full bg-green-100 text-green-700 font-semibold">
                {{ ucfirst($post->status) }}
            </span>
        </div>

        <!-- Judul -->
        <h1 class="text-4xl font-bold text-slate-800 mb-8">
            {{ $post->title }}
        </h1>

        <!-- Ringkasan -->
        @if($post->excerpt)
            <div class="mb-8 text-lg text-slate-600 italic border-l-4 border-[#5AA71B] pl-5">
                {{ $post->excerpt }}
            </div>
        @endif

        <!-- Isi -->
        <div class="prose prose-slate max-w-none leading-8">
            {!! nl2br(e($post->content)) !!}
        </div>

        <!-- Tombol -->
        <div class="mt-10">
            <a href="{{ url()->previous() }}">
                <x-ui.button variant="secondary">
                    Kembali
                </x-ui.button>
            </a>
        </div>
    </div>

</article>