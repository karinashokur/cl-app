<?php
namespace App\Http\Controllers;
use Validator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        $credentials = $request->only('name', 'lastname', 'phone', 'email', 'password');
        $validator = Validator::make($credentials, [
            'name'      => 'required',
            'lastname'  => 'required',
            'phone'     => 'required|min:10',
            'email'     => 'required|email|unique:users',
            'password'  => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 422);
        }
        $user = User::create($credentials);
        $user = User::where('email', $credentials['email'])->firstOrFail();
        return $user->createToken('intersession');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $validator = Validator::make($credentials, [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 422);
        }
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $credentials['email'])->firstOrFail();
            return $user->createToken('intersession');
        }
    }
    public function user(Request $request)
    {
        return $request->user();
    }
}
