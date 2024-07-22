<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task as ModelsTask;
use App\Models\Category as ModelsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $categories = ModelsCategory::where('user_id', $user->id)->get();
        $tasks = ModelsTask::where('user_id', $user->id)->orderBy('created_at')->get();
        
        return view('task.index', [
            'tasks' => $tasks,
            'categories' => $categories
        ]);
    }
}
