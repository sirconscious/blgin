<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    { 
        $users = User::all();
        return response()->json([
            'success' => true,
            'data' => $users,
        ]);
    } 
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);
        $user->roles()->attach($request->input('role_id', 3)); // Default to 'user' role if not specified
        return response()->json([
            'success' => true,
            'data' => $user,
        ], 201);

    }
}
