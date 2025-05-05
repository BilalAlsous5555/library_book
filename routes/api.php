<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;

Route::prefix('posts')->controller(PostController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{post}', 'show');
    Route::put('/{post}', 'update');
    Route::delete('/{post}', 'destroy');
});
