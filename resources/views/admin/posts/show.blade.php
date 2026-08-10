<x-app-layout>

<div class="max-w-5xl mx-auto space-y-6">

    <!-- Header  -->
    <div class="flex justify-between items-center">

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Preview Berita
            </h1>

            <p class="text-slate-500 text-sm">
                Tampilan berita sebelum dipublikasikan.
            </p>
        </div>

        <a href="{{ route('admin.posts.index') }}">
            <x-ui.button variant="secondary">
                Kembali
            </x-ui.button>
        </a>

    </div>

    <!-- Card  -->
    <x-ui.card>

        <!-- Cover  -->
        @if($post->image)
            <img
                src="{{ asset('storage/'.$post->image) }}"
                class="w-full h-96 object-cover rounded-xl mb-6">
        @endif

        <!--Judul-->
        <h1 class="text-4xl font-bold text-slate-800">
            {{ $post->title }}
        </h1>

        <!-- Meta -->
        <div class="flex items-center gap-4 mt-4 text-sm text-slate-500">
            <span>
                {{ $post->user->name }}
            </span>
            <span>
                {{ optional($post->published_at)->format('d F Y') ?? '-' }}
            </span>
            <x-ui.badge
                color="{{ $post->status == 'published' ? 'green' : 'yellow' }}">
                {{ ucfirst($post->status) }}
            </x-ui.badge>
        </div>

        <!-- Ringkasan  -->
        @if($post->excerpt)
            <div class="mt-8 p-5 rounded-xl bg-slate-100 italic text-slate-600">
                {{ $post->excerpt }}
            </div>
        @endif

        <!-- Isi  -->
        <div class="prose max-w-none mt-8 leading-8">
            {!! nl2br(e($post->content)) !!}
        </div>
    </x-ui.card>
</div>

</x-app-layout>