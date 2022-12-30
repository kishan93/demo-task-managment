<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return Inertia::render('Task/TaskIndex', compact('tasks'));
    }

    public function create()
    {
        return Inertia::render('Task/TaskForm');
    }

    public function store(Request $request)
    {
        Task::create($request->all());
        return redirect()->route('tasks.index')->with('alertSuccess', 'Task created.');
    }

    public function show(Task $task)
    {
        //
    }

    public function edit(Task $task)
    {
        return Inertia::render('Task/TaskForm', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return redirect()->route('tasks.index')->with('alertSuccess', 'Task updated.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('alertSuccess', 'Task deleted.');
    }
}
