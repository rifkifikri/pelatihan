<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'published')
                    ->latest()
                    ->take(6)
                    ->get();

        return view('frontend.home', compact('posts'));
    }

    //tampilkan semua halaman berita
    public function berita(Request $request)
    {
        $posts = Post::with('user')
            ->where('status', 'published')

            ->when($request->filled('search'), function ($query) use ($request) {

                $query->where('title', 'like', '%' . $request->search . '%');

            })

            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('frontend.posts.index', compact('posts'));
    }
}