<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ImageController;

Route::redirect('/', '/image/upload');

Route::get('/image/upload', [ImageController::class, 'upload'])->name('images.upload');
Route::post('/image/store', [ImageController::class, 'store'])->name('images.store');
Route::get('/image/{id}', [ImageController::class, 'show'])->name('images.show');
