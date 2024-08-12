<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DirectMessageController;
use App\Http\Controllers\BrowsingHistoryController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminNgwordController;



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

// Route for auth
require __DIR__ . '/auth.php';

// posts
Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
    Route::get('/create', [PostController::class, 'create'])->name('create');
    Route::get('/edit', [PostController::class, 'edit'])->name('edit');
    Route::get('/show', [PostController::class, 'show'])->name('show');
    Route::post('/store', [PostController::class, 'store'])->name('store');
    Route::get('/event-near-you', [PostController::class, 'showEventNearYou'])
        ->name('show-event-near-you');
});

Route::group(['prefix' => '/favorites', 'as' => 'favorites.'], function () {
    Route::get('/{user_id}', [FavoriteController::class, 'index'])->name('index');
});

Route::group(['prefix' => '/admin/users', 'as' => 'admin.users.'], function () {
    Route::get('/', [AdminUserController::class, 'index'])->name('index');
});

Route::group(['prefix' => '/profiles', 'as' => 'profiles.'], function () {
    // Routes go here
    Route::get('/{id}/show', [ProfileController::class, 'show'])
        ->name('show');
    Route::get('/{id}/edit', [ProfileController::class, 'edit'])
        ->name('edit');
});

Route::group(['prefix' =>'/direct-messages', 'as' =>'direct-messages.'], function() {
    Route::get('/', [DirectMessageController::class, 'index'])->name('index');
    Route::get('/{user_id}/show', [DirectMessageController::class, 'show'])->name('show');
});

Route::group(['prefix' =>'/browsing-history', 'as' =>'browsing-history.'], function() {
    Route::get('/{user_id}', [BrowsingHistoryController::class, 'index'])->name('index');
});

Route::group(['prefix' =>'/admin/users', 'as' =>'admin.users.'], function() {
    Route::get('/', [AdminUserController::class, 'index'])->name('index');
});

Route::group(['prefix' => '/admin/posts', 'as' => 'admin.posts.'], function () {
    Route::get('/{id}', [AdminPostController::class, 'index'])->name('index');
    Route::get('/{id}/show', [AdminPostController::class, 'show'])->name('show');
});

Route::group(['prefix' => '/admin/ngwords', 'as' => 'admin.ngwords.'], function () {
    Route::get('/', [AdminNgwordController::class, 'index'])->name('index');
    Route::post('/', [AdminNgwordController::class, 'store'])->name('store');
});

