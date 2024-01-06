<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ApiUserController extends Controller
{
 
    public function index()
    {
        $users = User::all();
        return response()->json($users, 200);
    }

    public function show($id)
    {
        $user = User::find($id);

        if ($user) {
            return response()->json($user, 200);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|unique:users',
            'password' => 'required|string',
            'email' => 'required|email|unique:users',
            'as' => 'required|string',
            'phone_number' => 'required|string',
            'address' => 'required|string',
        ]);

        $user = User::create($validatedData);

        return response()->json($user, 201);
    }

 
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $validatedData = $request->validate([
            'username' => 'required|string|unique:users,username,' . $id,
            'password' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'as' => 'required|string',
            'phone_number' => 'required|string',
            'address' => 'required|string',
        ]);

        $user->update($validatedData);

        return response()->json($user, 200);
    }


    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
