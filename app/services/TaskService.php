<?php
namespace App\Services;
use App\Models\Task;
use Auth;
use Illuminate\Validation\Rule;

/**
 * A service for the Taskcontroller
 *
 * @author khalid <thewinner016@gmail.com>
 *
 * @since 1.0.0
 */
class TaskService
{
    /**
     * handles the storing of task details in the database
     *
     * @param  mixed  $request  the user HTTP request containing
     *                          the details of the task to be stored
     * @return void
     *
     * @author khalid <thewinner016@gmail.com>
     *
     * @since 1.0.0
     */
    public static function store($request)
    {
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'ongoing',
            'user_id' => Auth::id(),
        ]);
    }

    /**
     * retrieves tasks for the authenticated user
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, Task>
     *
     * @author khalid <thewinner016@gmail.com>
     *
     * @since 1.0.0
     */
    public static function tasks()
    {
        $userid = Auth::id();
        $tasks = Task::where('user_id', $userid)->get();

        return $tasks;
    }

    /**
     * handles the updating of the task details in the database
     *
     * @param  mixed  $request  the HTTP request containing updated details
     * @param  mixed  $task  a model of the task being updated
     * @return void
     *
     * @author khalid <thewinner016@gmail.com>
     *
     * @since 1.0.0
     */
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
