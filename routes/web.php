<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => '/favorites', 'as'=>'favorites.'], function () {
    Route::get('/{user_id}', [FavoriteController::class, 'index'])->name('index');
    
});

