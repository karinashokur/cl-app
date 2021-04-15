<?php
namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;
class TaskController extends Controller
{
    public function index()
    {
      $tasks = Task::all();
      return view('task.index', compact('tasks'));
    }
    public function store(TaskRequest $request)
    {
        $task = Task::create($request->all());
        return response()->json('Task was successfuly stored.', 200);
    }
    public function show(Task $task)
    {
        return view('task.edit', compact('task'));
    }
    public function edit(Task $task)
    {
      return view('task.edit', compact('task'));
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
