<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function register()
    {
        return response()->json([], 200);
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return response()->json([], 200);
        }
    }
    public function recover()
    {
        return response()->json([], 200);
    }
    public function logout()
    {
        return response()->json([], 200);
    }
}
