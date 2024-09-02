<?php

require __DIR__ . '/auth.php';

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DirectMessageController;
use App\Http\Controllers\BrowsingHistoryController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminNgwordController;

// posts (every user is able to see)

// Top page
Route::get('/', [PostController::class, 'index'])
    ->name('posts.index');

Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
    Route::get('/{id}/show', [PostController::class, 'show'])
        ->name('show');
});

// Only logged-in user is able to see
Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
        Route::get('/create', [PostController::class, 'create'])
            ->name('create');
        Route::post('/store', [PostController::class, 'store'])
            ->name('store');
        Route::get('/{id}/edit', [PostController::class, 'edit'])
            ->name('edit');
        Route::patch('/{id}/update', [PostController::class, 'update'])
            ->name('update');
        Route::delete('/{id}/destroy', [PostController::class, 'destroy'])
            ->name('destroy');

        // Event near You
        Route::get('/event-near-you', [PostController::class, 'showEventNearYou'])
            ->name('show-event-near-you');
        //Calendar
        Route::get('/calendar', [PostController::class, 'showCalendar'])
            ->name('calendar');
    });

    // Favorites
    Route::group(['prefix' => '/favorites', 'as' => 'favorites.'], function () {
        Route::get('/', [FavoriteController::class, 'index'])
            ->name('index');
        Route::post('/{post_id}', [FavoriteController::class, 'store'])
            ->name('store');
        Route::delete('/{post_id}', [FavoriteController::class, 'destroy'])
            ->name('destroy');
    });

    //likes
    Route::group(['prefix' => 'likes', 'as' => 'likes.'], function () {
        Route::post('/{post_id}/store', [LikeController::class, 'store'])->name('store');
        Route::delete('/{post_id}/destroy', [LikeController::class, 'destroy'])->name('destroy');
    });

    //comments
    Route::group(['prefix' => 'comments', 'as' => 'comments.'], function () {
        Route::post('/{post_id}/store', [CommentController::class, 'store'])->name('store');
        Route::delete('/{id}', [CommentController::class, 'destroy'])->name('destroy');
    });

    // Profiles
    Route::group(['prefix' => '/profiles', 'as' => 'profiles.'], function () {
        // Routes go here
        Route::get('/show', [ProfileController::class, 'show'])
            ->name('show');
        Route::get('/edit', [ProfileController::class, 'edit'])
            ->name('edit');
        Route::patch('/update', [ProfileController::class, 'update'])
            ->name('update');
        Route::delete('/{id}', [ProfileController::class, 'destroy'])
            ->name('destroy');
    });

    // Direct Messages
    Route::group(['prefix' => '/direct-messages', 'as' => 'direct-messages.'], function () {
        Route::get('/', [DirectMessageController::class, 'index'])
            ->name('index');
        Route::get('/{user_id}/show', [DirectMessageController::class, 'show'])
            ->name('show');
    });

    // Browsing Histories
    Route::group(['prefix' => '/browsing-history', 'as' => 'browsing-history.'], function () {
        Route::get('/', [BrowsingHistoryController::class, 'index'])
            ->name('index');
    });
});

// Only logged-in Admin user is able to see
Route::group(['middleware' => 'admin'], function () {
    // Admin Pages
    // Admin Users
    Route::group(['prefix' => '/admin/users', 'as' => 'admin.users.'], function () {
        Route::get('/', [AdminUserController::class, 'index'])
            ->name('index');
        Route::delete('/{id}', [AdminUserController::class, 'destroy'])
            ->name('destroy');
    });

    // Admin Posts
    Route::group(['prefix' => '/admin/posts', 'as' => 'admin.posts.'], function () {
        Route::get('/', [AdminPostController::class, 'index'])
            ->name('index');
        Route::get('/{id}/show', [AdminPostController::class, 'show'])
            ->name('show');
        Route::delete('/{id}', [AdminPostController::class, 'destroy'])
            ->name('destroy');
    });

    // Admin NG Words
    Route::group(['prefix' => '/admin/ngwords', 'as' => 'admin.ngwords.'], function () {
        Route::get('/', [AdminNgwordController::class, 'index'])
            ->name('index');
        Route::post('/', [AdminNgwordController::class, 'store'])
            ->name('store');
        Route::delete('/{id}', [AdminNgwordController::class, 'destroy'])
            ->name('destroy');
    });
});
