<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
    Route::get('/get-data', [PostController::class, 'fetchData']);
});
