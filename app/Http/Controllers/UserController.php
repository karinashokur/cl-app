<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users, 200);
    }
    public function show(User $user)
    {
        return response()->json($user, 200);
    }
    public function edit(User $user)
    {
        return response()->json($user, 200);
    }
    public function update(Request $request, User $user)
    {
        $user->update($request->only('name', 'lastname', 'email', 'phone', 'password'));
        return response()->json($user, 200);
    }
    public function destroy(User $user)
    {
        if ($user->hasProjects()) {
            return response()->json('You have in progress projects', 401);
        }
        if ($user->hasCompany()) {
            return response()->json('You have in company projects', 401);
        }
        $user->delete();
        return response()->json(null, 204);
    }
}
