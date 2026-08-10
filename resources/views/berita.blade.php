<x-layout title="Konten">


<div class="max-w-7xl mx-auto px-4 py-8 font-poppins text-gray-700">

    <h1 class="text-3xl font-bold mb-8">
        Berita Terbaru
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @foreach ($posts as $post)

        <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:-translate-y-2 hover:shadow-2xl transition duration-300">

            {{-- Cover --}}
            @if ($post->image)

                <img
                    src="{{ asset('storage/'.$post->image) }}"
                    alt="{{ $post->title }}"
                    class="w-full h-56 object-cover">

            @else

                <div class="w-full h-56 bg-gray-200 flex items-center justify-center text-gray-500">
                    Belum ada gambar
                </div>

            @endif

            {{-- Isi Card --}}
            <div class="p-6">

                {{-- Judul --}}
                <h2 class="text-xl font-bold text-gray-700 line-clamp-2">
                    {{ $post->title }}
                </h2>

                {{-- Author dan Tanggal --}}
                <div class="flex items-center justify-between text-xs text-gray-500 mt-3">

                  <div class="flex items-center gap-3 text-xs text-gray-500">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke-width="1.5" stroke="currentColor" class="h-3 w-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                      </svg>

                      <span>{{ $post->author }}</span>
                  </div>

                    <span style="font-size: 0.65rem; color: #6B7280;">
                        {{ $post->created_at->format('d M Y') }}
                    </span>

                </div>

                {{-- Status --}}
                <div class="mt-4">
                    <span class="px-3 py-1 rounded-full text-xs font-semibold
                        {{ $post->status === 'published'
                            ? 'bg-green-100 bg-purple-900'
                            : 'bg-yellow-100 text-yellow-700' }}">

                        {{ ucfirst($post->status) }}
                    </span>
                </div>

                {{-- Ringkasan --}}
                <p class="mt-5 text-sm text-justify text-gray-600 leading-relaxed">
                    {{ Str::limit($post->content, 120) }}
                </p>

                {{-- Tombol --}}
                <div class="mt-6">

                    <a href="{{ route('posts.show', $post) }}"
                       class="inline-flex items-center text-xs bg-indigo-600 text-white px-3 py-2 rounded-xl hover:bg-indigo-700 transition">
                        Baca Selengkapnya &rsaquo;
                    </a>

                </div>

            </div>

        </article>

        @endforeach

    </div>

</div>

</x-layout>
