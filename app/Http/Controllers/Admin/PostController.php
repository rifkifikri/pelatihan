<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')
            ->latest()
            ->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'excerpt'       => 'nullable|string',
            'content'       => 'required|string',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'        => 'required|in:draft,published',
            'published_at'  => 'nullable|date',
        ]);

        // Generate slug otomatis
        $validated['slug'] = Str::slug($request->title);

        // Pastikan slug unik
        if (Post::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] .= '-' . time();
        }

        // Upload cover
        if ($request->hasFile('image')) {
            $validated['image'] = $request
                ->file('image')
                ->store('posts', 'public');
        }

        // Simpan user login
        $validated['user_id'] = Auth::id();

        // Jika publish tapi tanggal kosong
        if (
            $validated['status'] === 'published'
            && empty($validated['published_at'])
        ) {
            $validated['published_at'] = now();
        }

        Post::create($validated);

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
{
    $validated = $request->validate([
        'title'        => 'required|string|max:255',
        'excerpt'      => 'nullable|string',
        'content'      => 'required|string',
        'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'status'       => 'required|in:draft,published',
        'published_at' => 'nullable|date',
    ]);

    /*
    |--------------------------------------------------------------------------
    | Slug
    |--------------------------------------------------------------------------
    */

    $validated['slug'] = Str::slug(
        $request->filled('slug')
            ? $request->slug
            : $request->title
    );

    /*
    |--------------------------------------------------------------------------
    | Pastikan slug unik
    |--------------------------------------------------------------------------
    */

    if (
        Post::where('slug', $validated['slug'])
            ->where('id', '!=', $post->id)
            ->exists()
    ) {

        $validated['slug'] .= '-' . time();

    }

    /*
    |--------------------------------------------------------------------------
    | Upload Cover Baru
    |--------------------------------------------------------------------------
    */

    if ($request->hasFile('image')) {

        // hapus gambar lama
        if ($post->image && Storage::disk('public')->exists($post->image)) {

            Storage::disk('public')->delete($post->image);

        }

        $validated['image'] = $request
            ->file('image')
            ->store('posts', 'public');

    }

    /*
    |--------------------------------------------------------------------------
    | Publish otomatis
    |--------------------------------------------------------------------------
    */

    if (
        $validated['status'] == 'published'
        && empty($validated['published_at'])
    ) {

        $validated['published_at'] = now();

    }

    $post->update($validated);

    return redirect()
        ->route('admin.posts.index')
        ->with('success', 'Berita berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Hapus cover jika ada
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        // Soft delete
        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    public function berita()
    {
        $posts = Post::where('status', 'published')
                    ->latest()
                    ->get();

        return view('berita', [
            'title' => 'Berita',
            'posts' => $posts,
        ]);
    }

}
