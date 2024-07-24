<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\PostController;
=======
use App\Http\Controllers\AdminUserController;
>>>>>>> main

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

<<<<<<< HEAD
Route::group(['prefix' => 'post','as' => 'post.'],function(){
    Route::get('/create',[PostController::class,'create'])->name('create');
})
?>
=======

Route::group(['prefix' =>'/admin/users', 'as' =>'admin.users.'], function() {
    Route::get('/', [AdminUserController::class, 'index'])->name('index');
});

>>>>>>> main
