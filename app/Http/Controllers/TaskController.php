<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = TaskService::tasks();

        return view('tasklist', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('taskcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            TaskService::store($request);

            return redirect()->route('tasks')->with('success', 'Task added successfully !');
        } catch (QueryException $qe) {
            return redirect()->back()->withInput()->with([
                'error' => 'An error occurred while adding task, please try again !',
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with([
                'error' => 'Unknown error occurred while adding task, please try again !',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function updateStatus($id)
    {
        $task = Task::find($id);
        if (! $task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        $task->status = 'complete';
        $task->save();

        return response()->json(['success' => 'Task updated successfully !']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('taskupdate', compact('task'));
    }

    public function update(Request $request, Task $task)
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
        try {
            $task->update($request->only(['title', 'description']));

            return redirect()->route('tasks')->with('success', 'Task updated successfully !');
        } catch (QueryException $qe) {
            return redirect()->back()->withInput()->with([
                'error' => 'An error occurred while updating task, please try again !',
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with([
                'error' => 'Unknown error occurred while updating task, please try again !',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        if (! $task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        $task->delete(); // Delete the task

        return response()->json(['success' => 'Task deleted successfully !']);
    }
}
