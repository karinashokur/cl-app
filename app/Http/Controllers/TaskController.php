<?php
namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;
class TaskController extends Controller
{
    public function index()
    {
      $tasks = Task::all();
      return response()->json($tasks, 200);
    }
    public function store(TaskRequest $request)
    {
        $task = Task::create($request->all());
        return response()->json('Task was successfuly stored.', 200);
    }
    public function show(Task $task)
    {
        return response()->json($task, 200);
    }
    public function edit(Task $task)
    {
      return response()->json($task, 200);
    }
    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->all());
        return response()->json('Task was successfuly updated.', 200);
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json('Task was successfuly deleted.', 200);
    }
}
