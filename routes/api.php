<?php

use App\Http\Controllers\Api\TaskController;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResources([
    'tasks' => TaskController::class,
]);

