<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        $validData['password'] = bcrypt($validData['password']);
        $user = User::create($validData);
       

        $accessToken = $user->createToken('authToken')->accessToken;
        return[ new UserResource($user),
        'access_token' => $accessToken,
    ];

    }
    public function login(Request $request)
    {

        $validData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (!auth()->attempt($validData)) {
            return response()->json(['message' => 'invaild login', 401]);

        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return [
            'user' => new UserResource(auth()->user()),
            'access_token' => $accessToken,
        ];
    }
}
