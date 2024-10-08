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
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

// Every users are able to see
// Top page
Route::get('/', [PostController::class, 'index'])
    ->name('posts.index');

// Posts
Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
    Route::get('/{id}/show', [PostController::class, 'show'])
        ->where('id', '[0-9]+')
        ->name('show');

    // Infinite Scroll
    Route::post('/load-more-posts', [PostController::class, 'loadMorePosts'])
        ->name('load-more-posts');

    //About
    Route::get('/about', [AboutController::class, 'index'])
        ->name('about');

    //Contact
    Route::get('/contact', [ContactController::class, 'index'])
        ->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])
        ->name('contact.store');

    //Calendar
    Route::get('/calendar', [PostController::class, 'showCalendar'])
        ->name('calendar');
});

// Only logged-in user is able to see
Route::group(['middleware' => 'user'], function () {
    Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
        Route::get('/select-category', [PostController::class, 'selectCategory'])
            ->name('select-category');
        Route::get('/create', [PostController::class, 'create'])
            ->name('create');
        Route::post('/store', [PostController::class, 'store'])
            ->name('store');
        Route::get('/{id}/edit', [PostController::class, 'edit'])
            ->where('id', '[0-9]+')
            ->name('edit');
        Route::patch('/{id}/update', [PostController::class, 'update'])
            ->where('id', '[0-9]+')
            ->name('update');
        Route::delete('/{id}/destroy', [PostController::class, 'destroy'])
            ->where('id', '[0-9]+')
            ->name('destroy');

        // Event near You
        Route::get('/event-near-you', [PostController::class, 'showEventNearYou'])
            ->name('show-event-near-you');

        // Post Translation
        Route::post('/translate-article', [PostController::class, 'translateArticle']);

        // Post TTS
        Route::post('/generate-audio-url', [PostController::class, 'generateAudioUrl']);
    });

    // Favorites
    Route::group(['prefix' => '/favorites', 'as' => 'favorites.'], function () {
        Route::get('/', [FavoriteController::class, 'index'])
            ->name('index');
        // Route::post('/{post_id}', [FavoriteController::class, 'store'])
        //     ->where('post_id', '[0-9]+')
        //     ->name('store');
        // Route::delete('/{post_id}', [FavoriteController::class, 'destroy'])
        //     ->where('post_id', '[0-9]+')
        //     ->name('destroy');
        Route::post('/{post_id}/toggle', [FavoriteController::class, 'toggle'])
            ->where('post_id', '[0-9]+')
            ->name('toggle');
    });

    //likes
    Route::group(['prefix' => 'likes', 'as' => 'likes.'], function () {
        // Route::post('/{post_id}/store', [LikeController::class, 'store'])
        //     ->where('post_id', '[0-9]+')
        //     ->name('store');
        // Route::delete('/{post_id}/destroy', [LikeController::class, 'destroy'])
        //     ->where('post_id', '[0-9]+')
        //     ->name('destroy');

        Route::post('/{post_id}/toggle', [LikeController::class, 'toggle'])
            ->where('post_id', '[0-9]+')
            ->name('toggle');
    });

    //comments
    Route::group(['prefix' => 'comments', 'as' => 'comments.'], function () {
        Route::post('/{post_id}/store', [CommentController::class, 'store'])
            ->where('post_id', '[0-9]+')
            ->name('store');
        Route::delete('/{id}', [CommentController::class, 'destroy'])
            ->where('id', '[0-9]+')
            ->name('destroy');
    });

    // Profiles
    Route::group(['prefix' => '/profiles', 'as' => 'profiles.'], function () {
        // Routes go here
        Route::get('/{user_id}', [ProfileController::class, 'show'])
            ->where('user_id', '[0-9]+')
            ->name('show');
        Route::get('/{user_id}/edit', [ProfileController::class, 'edit'])
            ->where('user_id', '[0-9]+')
            ->name('edit');
        Route::patch('/{user_id}/update', [ProfileController::class, 'update'])
            ->where('user_id', '[0-9]+')
            ->name('update');
        Route::delete('/{user_id}', [ProfileController::class, 'destroy'])
            ->where('user_id', '[0-9]+')
            ->name('destroy');
    });

    // Direct Messages
    Route::group(['prefix' => '/direct-messages', 'as' => 'direct-messages.'], function () {
        Route::get('/', [DirectMessageController::class, 'index'])
            ->name('index');
        Route::get('/{user_id}/show', [DirectMessageController::class, 'show'])
            ->where('user_id', '[0-9]+')
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
            ->where('id', '[0-9]+')
            ->name('destroy');
    });

    // Admin Posts
    Route::group(['prefix' => '/admin/posts', 'as' => 'admin.posts.'], function () {
        Route::get('/', [AdminPostController::class, 'index'])
            ->name('index');
        Route::get('/{id}/show', [AdminPostController::class, 'show'])
            ->where('id', '[0-9]+')
            ->name('show');
        Route::delete('/{id}', [AdminPostController::class, 'destroy'])
            ->where('id', '[0-9]+')
            ->name('destroy');
        Route::delete('/{id}/comment', [AdminPostController::class, 'destroyComment'])
            ->where('id', '[0-9]+')
            ->name('destroyComment');
    });

    // Admin NG Words
    Route::group(['prefix' => '/admin/ngwords', 'as' => 'admin.ngwords.'], function () {
        Route::get('/', [AdminNgwordController::class, 'index'])
            ->name('index');
        Route::post('/', [AdminNgwordController::class, 'store'])
            ->name('store');
        Route::delete('/{id}', [AdminNgwordController::class, 'destroy'])
            ->where('id', '[0-9]+')
            ->name('destroy');
    });

    //Admin Inquires
    Route::group(['prefix' => '/admin/inquires', 'as' => 'admin.inquires.'], function () {
        Route::get('/', [AdminContactController::class, 'index'])
            ->name('index');
        Route::delete('/{id}', [AdminContactController::class, 'destroy'])
            ->where('id', '[0-9]+')
            ->name('destroy');
        Route::get('/{id}/show', [AdminContactController::class, 'show'])
            ->where('id', '[0-9]+')
            ->name('show');
        Route::patch('/{id}', [AdminContactController::class, 'update'])
            ->where('id', '[0-9]+')
            ->name('update');
    });
});
