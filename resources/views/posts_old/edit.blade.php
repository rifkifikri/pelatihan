<x-app-layout>

<div class="space-y-6">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Edit Berita
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Perbarui informasi berita yang sudah ada.
            </p>
        </div>

        <a href="{{ route('posts.index') }}">
            <x-ui.button variant="secondary">
                ← Kembali
            </x-ui.button>
        </a>
    </div>

@if ($errors->any())

<div class="rounded-xl border border-red-300 bg-red-50 p-4">
    <ul class="list-disc pl-5 text-red-600">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- KOLOM KIRI -->

            <div class="lg:col-span-2">
                <x-ui.card>
                    <div class="space-y-5">

                        <!-- Judul -->
                        <div>
                            <label class="mb-2 block font-medium">
                                Judul Berita
                            </label>
                            <x-ui.input  name="title" placeholder="Masukkan judul berita..." value="{{ old('title', $post->title) }}"  required />
                        </div>

                        <!-- Slug -->
                        <div>
                            <label class="mb-2 block font-medium">
                                Slug
                            </label>
                            <x-ui.input name="slug" placeholder="Slug otomatis..." value="{{ old('slug', $post->slug) }}" />
                        </div>

                        <!-- Gambar -->
                        @if($post->image)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $post->image) }}" class="w-full rounded-xl border object-cover">
                        </div>
                        @endif

                        <!-- Ringkasan -->
                        <div>
                            <label class="mb-2 block font-medium">
                                Ringkasan
                            </label>

                            <textarea name="excerpt" rows="4" class="w-full rounded-xl border border-slate-300 p-3 focus:border-[#5AA71B] focus:ring-[#5AA71B]">
                                {{ old('excerpt', $post->excerpt) }}</textarea>
                        </div>

                        <!-- Isi -->
                        <div>
                            <label class="mb-2 block font-medium">
                                Isi Berita
                            </label>
                            <textarea  name="content" rows="15" class="w-full rounded-xl border border-slate-300 p-3 focus:border-[#5AA71B] focus:ring-[#5AA71B]">
                                {{ old('content', $post->content) }}</textarea>
                        </div>
                    </div>
                </x-ui.card>
            </div>

            <!-- KOLOM KANAN -->

            <div>
                <x-ui.card>
                    <div class="space-y-5">
                        <!-- Cover -->
                        <div>
                            <label class="mb-2 block font-medium">
                                Cover Berita
                            </label>
                            <input type="file" name="image" class="block w-full rounded-xl border border-slate-300 p-2">
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="mb-2 block font-medium">
                                Status
                            </label>

                            <select name="status">
                                <option value="draft"  @selected(old('status', $post->status) == 'draft')>
                                    Draft
                                </option>
                                <option value="published"  @selected(old('status', $post->status) == 'published')>
                                    Publish
                                </option>
                            </select>
                        </div>

                        <!-- Publish -->
                        <div>
                            <label class="mb-2 block font-medium">
                                Tanggal Publish
                            </label>
                            <input type="datetime-local" name="published_at" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}">
                        </div>

                        <hr>
                        <x-ui.button type="submit" class="w-full">
                            Simpan Perubahan
                        </x-ui.button>
                    </div>
                </x-ui.card>
            </div>
        </div>
    </form>
</div>

</x-app-layout>