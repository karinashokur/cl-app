<?php
namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;
class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('undertasks')->get()->toJson();
        return response()->json($tasks, 200);
    }
    public function store(Request $request)
    {
        $task = Task::create($request->all());
        return response()->json($task, 200);
    }
    public function show(Task $task)
    {
        return response()->json($task->load('undertasks'), 200);
    }
    public function edit(Task $task)
    {
        return response()->json($task::with('undertasks'), 200);
    }
    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return response()->json($task->load('undertasks'), 200);
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(null, 204);
    }
}
