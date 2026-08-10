<x-app-layout>

<div class="space-y-6">

    <!--  Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Tambah Berita
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Tambahkan berita baru untuk ditampilkan pada website.
            </p>
        </div>

        <a href="{{ route('posts.index') }}">
            <x-ui.button variant="secondary">
                Kembali
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

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!--  KOLOM KIRI -->

            <div class="lg:col-span-2">
                <x-ui.card>
                    <div class="space-y-5">

                        <!--  Judul -->
                        <div>
                            <label class="mb-2 block font-medium">
                                Judul Berita
                            </label>
                            <x-ui.input  name="title" placeholder="Masukkan judul berita..." value="{{ old('title') }}"  required />
                        </div>

                        <!--  Slug -->
                        <div>
                            <label class="mb-2 block font-medium">
                                Slug
                            </label>
                            <x-ui.input name="slug" placeholder="Slug otomatis..." value="{{ old('slug') }}" />
                        </div>

                        <!--  Ringkasan -->
                        <div>
                            <label class="mb-2 block font-medium">
                                Ringkasan
                            </label>

                            <textarea name="excerpt" rows="4" class="w-full rounded-xl border border-slate-300 p-3 focus:border-[#5AA71B] focus:ring-[#5AA71B]">{{ old('excerpt') }}</textarea>
                        </div>

                        <!--  Isi -->
                        <div>
                            <label class="mb-2 block font-medium">
                                Isi Berita
                            </label>
                            <textarea  name="content" rows="15" class="w-full rounded-xl border border-slate-300 p-3 focus:border-[#5AA71B] focus:ring-[#5AA71B]">{{ old('content') }}</textarea>
                        </div>
                    </div>
                </x-ui.card>
            </div>

            <!--  KOLOM KANAN -->

            <div>
                <x-ui.card>
                    <div class="space-y-5">
                        <!--  Cover -->
                        <div>
                            <label class="mb-2 block font-medium">
                                Cover Berita
                            </label>
                            <input type="file" name="image" class="block w-full rounded-xl border border-slate-300 p-2">
                        </div>

                        <!--  Status -->
                        <div>
                            <label class="mb-2 block font-medium">
                                Status
                            </label>

                            <select name="status" class="w-full rounded-xl border border-slate-300 p-3">
                                <option value="draft">
                                    Draft
                                </option>
                                <option value="published">
                                    Publish
                                </option>
                            </select>
                        </div>

                        <!--  Publish -->
                        <div>
                            <label class="mb-2 block font-medium">
                                Tanggal Publish
                            </label>
                            <input type="datetime-local" name="published_at"  class="w-full rounded-xl border border-slate-300 p-3">
                        </div>

                        <hr>
                        <x-ui.button type="submit" class="w-full">
                            Simpan Berita
                        </x-ui.button>
                    </div>
                </x-ui.card>
            </div>
        </div>
    </form>
</div>

</x-app-layout>