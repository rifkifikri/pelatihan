<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    {{-- Kolom Kiri --}}
    <div class="lg:col-span-2">
        <x-ui.card>
            <div class="space-y-5">
<div>
    <label class="block mb-2 font-medium">
        Judul Berita
    </label>
    <x-ui.input name="title" :value="old('title',$post->title ?? '')" placeholder="Masukkan judul..." />
</div>

<!-- SLUG -->
<div>
    <label class="block mb-2 font-medium">  Slug </label>
    <x-ui.input  name="slug" :value="old('slug',$post->slug ?? '')" />
</div>

<!-- RINGKASAN -->
<div>
<label class="block mb-2 font-medium">Ringkasan</label>
<textarea name="excerpt" rows="4" class="w-full rounded-xl border border-slate-300 p-3">{{ old('excerpt',$post->excerpt ?? '') }}</textarea>
</div>

<!-- ISI -->
 <div>
<label class="block mb-2 font-medium">
Isi Berita
</label>
<textarea name="content" rows="15" class="w-full rounded-xl border border-slate-300 p-3">{{ old('content',$post->content ?? '') }}</textarea>
</div>

<!-- Kolom Kanan -->
 
@if(!empty($post?->image))
<img src="{{ asset('storage/'.$post->image) }}" class="rounded-xl mb-3">
@endif

<!-- Ststus -->
<select name="status" class="w-full rounded-xl border p-3">
<option value="draft" @selected(old('status',$post->status ?? '')=='draft')> Draft </option>
<option value="published" @selected(old('status',$post->status ?? '')=='published')> Publish </option>
</select>

<!-- Tombol -->
 <x-ui.button type="submit" class="w-full"> Simpan Berita </x-ui.button>