<?php

namespace App\Services;

use App\Models\Task;
use Auth;
use Illuminate\Validation\Rule;

class TaskService
{
    public static function store($request)
    {
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'ongoing',
            'user_id' => Auth::id(),
        ]);
    }

    public static function tasks()
    {
        $userid = Auth::id();
        $tasks = Task::where('user_id', $userid)->get();

        return $tasks;
    }

    public static function updateTask($request, $task)
    {
        $request->validate([
            'title' => [
                'required',
                Rule::unique('tasks')->ignore($task->id),
            ],
            'description' => 'required',
        ], [
            'title.unique' => 'Task already added before',
        ]);
    }
}
