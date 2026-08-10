<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\FrontendController;
use App\Models\Post;
use App\Http\Controllers\Pengguna\PengajuanController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Pengguna\DashboardController as PenggunaDashboardController;
use App\Http\Controllers\Admin\UserController;




Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::prefix('admin')
    ->middleware(['auth','verified'])
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard',
            [AdminDashboardController::class,'index']
        )->name('dashboard');
        Route::resource('posts', PostController::class);

        Route::patch('/users/{user}/activate', [UserController::class, 'activate'])
            ->name('users.activate');

        Route::patch('/users/{user}/reject', [UserController::class, 'reject'])
            ->name('users.reject');

        Route::patch('/users/{user}/make-admin', [UserController::class, 'makeAdmin'])
            ->name('users.make-admin');

    });

Route::prefix('pengguna')
    ->middleware('auth')
    ->name('pengguna.')
    ->group(function () {
        Route::get('/dashboard',
            [PenggunaDashboardController::class,'index']
        )->name('dashboard');
        Route::resource('pengajuan', PengajuanController::class);
    });

require __DIR__.'/auth.php';

Route::get('/berita/{post:slug}', function (Post $post) {
    return view('frontend.posts.show', compact('post'));
})->name('berita.show');

Route::get('/berita', [FrontendController::class, 'berita'])
    ->name('berita.index');

Route::get('/captcha/generate', function () {
    $a = rand(1,20);
    $b = rand(1,20);
    Session::put('captcha_answer',$a+$b);
    return response()->json([
        'question'=>"$a + $b = ?"
    ]);
})->name('captcha.generate');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {
        Route::resource('users', UserController::class);
});