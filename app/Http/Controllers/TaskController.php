<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * A controller for handling all the task related routes (requests)
 *
 * @author khalid <thewinner016@gmail.com>
 *
 * @since 1.0.0
 */
class TaskController extends Controller
{
    /**
     * retrieves and displays all the tasks
     *
     * @return \Illuminate\Contracts\View\View
     *
     * @author khalid <thewinner016@gmail.com>
     *
     * @since 1.0.0
     */
    public function index()
    {
        $tasks = TaskService::tasks();

        return view('tasklist', compact('tasks'));
    }

    /**
     * Displays a form for adding a new task
     *
     * @return \Illuminate\Contracts\View\View
     *
     * @author khalid <thewinner016@gmail.com>
     *
     * @since 1.0.0
     */
    public function create()
    {
        return view('taskcreate');
    }

    /**
     * stores the added task in the database
     *
     * @param  \Illuminate\Http\Request  $request  a request containing new task details
     * @return \Illuminate\Http\RedirectResponse
     *
     * @author khalid <thewinner016@gmail.com>
     *
     * @since 1.0.0
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:100', 'unique:tasks,title'],
            'description' => ['required', 'string'],
        ], [
            'title.unique' => 'Task already added before',
        ]);
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
     * handles the updating of a task status
     *
     * @param  mixed  $id  the id of the task being updated
     * @return \Illuminate\Http\JsonResponse
     *
     * @author khalid <thewinner016@gmail.com>
     *
     * @since 1.0.0
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
     * displays a form for updating task details
     *
     * @param  \App\Models\Task  $task  the model of the task being updated
     * @return \Illuminate\Contracts\View\View
     *
     * @author khalid <thewinner016@gmail.com>
     *
     * @since 1.0.0
     */
    public function edit(Task $task)
    {
        return view('taskupdate', compact('task'));
    }

    /**
     * handling the updating of a task's details
     *
     * @param  \Illuminate\Http\Request  $request  a request containing updated task details
     * @param  \App\Models\Task  $task  the model of the task being updated
     * @return \Illuminate\Http\RedirectResponse
     *
     * @author khalid <thewinner016@gmail.com>
     *
     * @since 1.0.0
     */
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
     * handling the deleting of a task
     *
     * @param  mixed  $id  the id of task being deleted
     * @return \Illuminate\Http\JsonResponse
     *
     * @author khalid <thewinner016@gmail.com>
     *
     * @since 1.0.0
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        if (! $task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['success' => 'Task deleted successfully !']);
    }
}
