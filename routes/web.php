<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DirectMessageController;
use App\Http\Controllers\BrowsingHistoryController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminNgwordController;

// Require Route file for auth
// require __DIR__ . '/auth.php';

// For Auth
Auth::routes();
// Able to be applied with laravel/ui package
// It generates:
// GET /login: Shows login form
// POST /login: Processes login
// POST /logout: Processes logout
// GET /register: Shows register form
// POST /register: Processes register

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Top page
Route::get('/', [PostController::class, 'index'])
    ->name('index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// posts
Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
    Route::get('/create', [PostController::class, 'create'])->name('create');
    Route::get('/edit', [PostController::class, 'edit'])->name('edit');
    Route::get('/{id}/show', [PostController::class, 'show'])->name('show');
    Route::post('/store', [PostController::class, 'store'])->name('store');
    Route::get('/event-near-you', [PostController::class, 'showEventNearYou'])
        ->name('show-event-near-you');
});

Route::group(['prefix' => '/favorites', 'as' => 'favorites.'], function () {
    Route::get('/{user_id}', [FavoriteController::class, 'index'])->name('index');
    Route::post('/store',[FavoriteController::class, 'store'])->name('store');
});

// profiles
Route::group(['prefix' => '/profiles', 'as' => 'profiles.'], function () {
    // Routes go here
    Route::get('/{id}/show', [ProfileController::class, 'show'])
        ->name('show');
    Route::get('/{id}/edit', [ProfileController::class, 'edit'])
        ->name('edit');
    // Route::get('/{id}/edit', [ProfileController::class, 'edit'])
    //     ->name('edit'); ←Editリンクテストのため一時的に/{id}/を除く？
});

Route::group(['prefix' => '/direct-messages', 'as' => 'direct-messages.'], function () {
    Route::get('/', [DirectMessageController::class, 'index'])->name('index');
    Route::get('/{user_id}/show', [DirectMessageController::class, 'show'])->name('show');
});

Route::group(['prefix' => '/browsing-history', 'as' => 'browsing-history.'], function () {
    Route::get('/{user_id}', [BrowsingHistoryController::class, 'index'])->name('index');
});

// Admin Pages
Route::group(['middleware' => 'admin'], function () {
    Route::group(['prefix' => '/admin/users', 'as' => 'admin.users.'], function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('index');
        Route::delete('/{id}', [AdminUserController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '/admin/posts', 'as' => 'admin.posts.'], function () {
        Route::get('/', [AdminPostController::class, 'index'])->name('index');
        Route::get('/{id}/show', [AdminPostController::class, 'show'])->name('show');
        Route::delete('/{id}', [AdminPostController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '/admin/ngwords', 'as' => 'admin.ngwords.'], function () {
        Route::get('/', [AdminNgwordController::class, 'index'])->name('index');
        Route::post('/', [AdminNgwordController::class, 'store'])->name('store');
        Route::delete('/{id}', [AdminNgwordController::class, 'destroy'])->name('destroy');
    });
});
