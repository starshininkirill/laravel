<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;



Route::get('/', [TaskController::class, 'index'])->name('home');

Route::get('/category/{id}/',[CategoryController::class, 'show'])->name('category.show');
Route::post('/', [CategoryController::class, 'store'])->name('category.store');
