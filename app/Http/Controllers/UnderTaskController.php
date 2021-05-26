<?php
namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;
class UnderTaskController extends Controller
{
    public function store(Request $request, Task $task)
    {
        $underTask = new Task($request->all());
        $underTask->task_id = $task->id;
        $underTask->save();
        return response()->json($task->load('undertasks')->get(), 200);
    }
}
