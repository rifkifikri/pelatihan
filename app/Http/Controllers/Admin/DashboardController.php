<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPosts = Post::count();
        $publishedPosts = Post::where('status', 'published')->count();
        $draftPosts = Post::where('status', 'draft')->count();


        $totalUsers = User::where('role', 'user')->count();

        // sementara dummy
        $totalPengajuan = 300;
        $totalVisitors = 1520;

        return view('admin.dashboard', compact(
            'totalPosts',
            'publishedPosts',
            'draftPosts',
            'totalUsers',
            'totalPengajuan',
            'totalVisitors'
        ));
    }
}