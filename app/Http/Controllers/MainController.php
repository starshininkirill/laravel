<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task as ModelsTask;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function index()
    {
        $tasks = ModelsTask::all();
        return view('index', ['tasks' => $tasks]);
    }
}
