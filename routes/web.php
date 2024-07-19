<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index'])->name('home');

Route::get('/category/{id}/',[CategoryController::class, 'show'])->name('category.show');
Route::post('/category/', [CategoryController::class, 'store'])->name('category.store');

Route::get('/register', [AuthController::class, ''])->name('register');

