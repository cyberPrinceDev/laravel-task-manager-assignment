<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255|unique:tasks',
            'description' => 'nullable|string|max:500',
            'is_completed' => 'boolean',
            'scheduled_date' => 'nullable|date',
            'start_time' => 'nullable|date_format:H:i',
            'reminder_time' => 'nullable|date_format:H:i',
        ]);

        Task::create($request->only([
            'title', 'description', 'is_completed', 'scheduled_date', 'start_time', 'reminder_time'
        ]));

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function markComplete(Request $request, $id)
    {
        $request->validate([
            'scheduled_date' => 'nullable|date',
            'start_time' => 'nullable|date_format:H:i',
            'reminder_time' => 'nullable|date_format:H:i',
        ]);

        $task = Task::findOrFail($id);
        $task->scheduled_date = $request->input('scheduled_date');
        $task->start_time = $request->input('start_time');
        $task->reminder_time = $request->input('reminder_time');
        $task->is_completed = true;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task marked complete.');
    }
}
