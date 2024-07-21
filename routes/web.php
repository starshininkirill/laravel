<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->name('home');

Route::get('/category/{id}/', [CategoryController::class, 'show'])->name('category.show');
Route::post('/category/', [CategoryController::class, 'store'])->name('category.store');


Route::middleware('guest')->group(function () {
   Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
   Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

   Route::get('/login', [LoginController::class, 'index'])->name('login');
   Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function () {
   Route::get('/logout', [LogoutController::class, 'index'])->name('logout');
});
