<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminUserController;
// use App\Http\Controllers\AdminUserController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

Route::group(['prefix' => 'post', 'as' => 'post.'],function () {
    Route::get('/create',[PostController::class,'create'])->name('create');
});

Route::group(['prefix' => '/favorites', 'as'=>'favorites.'], function () {
    Route::get('/{user_id}', [FavoriteController::class, 'index'])->name('index');
    
});


Route::group(['prefix' => '/profiles', 'as' => 'profiles.'], function () {
    // Routes go here
   Route::get('/{id}/show', [ProfileController::class, 'show'])
    ->name('show'); 

});

Route::group(['prefix' =>'/admin/users', 'as' =>'admin.users.'], function() {
    Route::get('/', [AdminUserController::class, 'index'])->name('index');
});

?>