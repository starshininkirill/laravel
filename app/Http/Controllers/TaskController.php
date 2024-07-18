<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task as ModelsTask;
use App\Models\Category as ModelsCategory;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function index()
    {
        $categories = ModelsCategory::all();
        $tasks = ModelsTask::all()->sortByDesc('created_at');
        
        return view('tasks.index', [
            'tasks' => $tasks,
            'categories' => $categories
        ]);
    }
}
