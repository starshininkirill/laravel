<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task as ModelsTask;
use App\Models\Category as ModelsCategory;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function index()
    {
        $tasks = ModelsTask::all()->sortByDesc('created_at');
        return view('index', ['tasks' => $tasks]);
    }
}
