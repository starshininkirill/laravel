<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Task as ModelsTask;
use App\Models\Category as ModelsCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $created_category = Category::create($request->validated());

        return redirect()->route('home')->with('success', 'Категория успешно создана.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = ModelsCategory::all();
        $tasks = ModelsTask::where('category_id', $id)->get()->sortByDesc('created_at');
        
        return view('task.index', [
            'tasks' => $tasks,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
