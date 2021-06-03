<?php
namespace App\Http\Controllers;
use App\Project;
use Illuminate\Http\Request;
class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return response()->json($projects, 200);
    }
    public function store(Request $request)
    {
        Project::create($request->all());
        return response()->json('Project was successfuly stored.', 200);
    }
    public function show(Project $project)
    {
        return response()->json($project, 200);
    }
    public function edit(Project $project)
    {
        return $response->json($project, 200);
    }
    public function update(Request $request, Project $project)
    {
      $project->update($request->all());
      return response()->json('Project was successfuly updated.', 200);
    }
    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json('Project was successfuly deleted', 200);
    }
}
