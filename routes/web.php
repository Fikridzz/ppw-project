<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin
Route::get('/', function () {
    return view('home');
})->middleware(['auth', 'verified', 'admin'])->name('home');

// User
Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('/products', ProductController::class);

Route::resource('/category', CategoryController::class);

require __DIR__.'/auth.php';
