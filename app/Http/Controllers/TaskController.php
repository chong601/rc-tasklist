<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Validation\Validator;
use DateTime;
use DateTimeZone;

class TaskController extends Controller
{
    // Returns the main tasks view
    function listTasks()
    {
        return view('tasks', [
            'tasks' => Task::orderBy('created_at', 'asc')->get()
        ]);
    }

    function createNewTask(Request $request)
    {
        // Add validation
        // DateTime validation: Y-m-d\TH:i:sP (conforming to datetime-local rules)

        $validated = $request->validate([
            'name' => 'required|unique:\App\Models\Task,name|',
            'deadline' => 'required|date|after:now'
        ]);
        
        $task = new Task;
        $task->name = $validated['name'];
        $task->deadline = $validated['deadline'];
        $task->deadline->tz('Asia/Kuala_Lumpur');
        $task->save();

        return redirect('/');
    }

    function toggleCompleted(Task $taskId) {
        $task = Task::findOrFail($taskId->id);
        if ($task->completed)
        {
            $task->completed = null;
        }
        else
        {
            $task->completed = new DateTime();
        }
        $task->save();
        return redirect('/');
    }

    function deleteTask(Task $taskId)
    {
        Task::findOrFail($taskId->id)->delete();

        return redirect('/');
    }
}
