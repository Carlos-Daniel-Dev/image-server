<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ImageController;
use App\Http\Controllers\SingUpController;
use App\Http\Controllers\LoginController;


Route::redirect('/', '/image/upload')->name('home');

Route::get('/image/upload', [ImageController::class, 'upload'])->name('images.upload');
Route::post('/image/store', [ImageController::class, 'store'])->name('images.store');
Route::get('/image/{id}', [ImageController::class, 'show'])->name('images.show');

Route::get('/singup', [SingUpController::class, 'index'])->name('singup');
Route::get('/singup/store', [LoginController::class, 'store'])->name('singup.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');
